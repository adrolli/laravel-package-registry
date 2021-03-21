<div>

    <div id="example-images"></div>

    <script id='image-tpl' type='text/x-mustache'>
        @{{#.}}
            <div class="image-section" data-image="@{{.}}">
                <h2>@{{.}}</h2>
                <img class="image" src="colorextract/img/@{{.}}" />
                <div class="output"></div>
            </div>
        @{{/.}}
    </script>

    <script id="color-tpl" type="text/x-mustache">
        <div class="color">
            <h3>getColor(img)</h3>
            <div class="swatches">
                <div class="swatch" style="background-color: rgb(@{{color.0}}, @{{color.1}}, @{{color.2}})"></div>
            </div>
            <code>
                <div class="output-color">@{{colorStr}}</div>
                <div class="time">@{{elapsedTime}}ms</div>
            </code>
        </div>
    </script>

    <script id="palette-tpl" type="text/x-mustache">
        <div class="palette" data-count="@{{count}}">
            <h3>getPalette(img, @{{count}})</h3>
            <div class="swatches">
                @{{#palette}}
                    <div class="swatch" style="background-color: rgb(@{{0}}, @{{1}}, @{{2}})"></div>
                @{{/palette}}
            </div>
            <code>
                <div class="output-palette">@{{paletteStr}}</div>
                <div class="time">@{{elapsedTime}}ms</div>
            </code>
        </div>
    </script>

  <script src="colorextract/color-thief.umd.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/3.0.1/mustache.min.js"></script>
  <!-- script src="colorextract/dropzone/min/dropzone.min.js"></script -->
  <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

  <script>

    //Dropzone.options.logo = {
    //init: function() {
    //    this.on("addedfile", function(file) { alert("Added file."); });
    //}
    //};

    var colorThief = new ColorThief();

    var images = [
        'image-1.jpg',
    ];

    // Render example images
    var examplesHTML = Mustache.to_html(document.getElementById('image-tpl').innerHTML, images);
    document.getElementById('example-images').innerHTML = examplesHTML;

    // Once images are loaded, process them
    document.querySelectorAll('.image').forEach((image) => {
        const section = image.closest('.image-section');
        if (image.complete) {
            showColorsForImage(image, section);
        } else {
            image.addEventListener('load', function() {
                showColorsForImage(image, section);
            });
        }
    })

    // Run Color Thief functions and display results below image.
    // We also log execution time of functions for display.
    const showColorsForImage = function(image, section) {
        let start = Date.now();

        // 🎨🔓
        let result = colorThief.getColor(image);

        let elapsedTime = Date.now() - start;
        const colorHTML = Mustache.to_html(document.getElementById('color-tpl').innerHTML, {
            color: result,
            colorStr: result.toString(),
            elapsedTime
        })

        // getPalette(img)
        let paletteHTML = '';
        let colorCounts = [3, 9];
        colorCounts.forEach((count) => {
            let start = Date.now();

            // 🎨🔓
            let result = colorThief.getPalette(image, count);

            let elapsedTime = Date.now() - start;
            paletteHTML += Mustache.to_html(document.getElementById('palette-tpl').innerHTML, {
                count,
                palette: result,
                paletteStr: result.toString(),
                elapsedTime
            })
        });

        const outputEl = section.querySelector('.output');
        outputEl.innerHTML += colorHTML + paletteHTML;
    };

  </script>
      <script>
        const inputElement = document.querySelector('input[type="file"]');
        const pond = FilePond.create( inputElement );
        </script>

    <div class="relative pt-16 bg-gray-50 sm:pt-24 lg:pt-32">
        <div class="max-w-md px-4 mx-auto sm:px-6 sm:max-w-3xl lg:px-8 lg:max-w-7xl">
            <div class="grid grid-cols-1 gap-8">
                <livewire:tallui:theme.theme-info />
            </div>
        </div>
    </div>

</div>
