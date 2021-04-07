<?php

declare(strict_types=1);

namespace BladeUIKit\Components\Buttons;

use BladeUIKit\Components\BladeComponent;
use Illuminate\Contracts\View\View;

class FormButton extends BladeComponent
{
    /** @var string */
    public $action;

    /** @var string */
    public $method;

    /** @var string */
    public $form;

    /** @var string */
    public $type;

    //type="success" size="lg" width="full" tui="forgetit" form="inline"

    public function __construct(string $action, string $type = 'default', string $method = 'POST', string $form = 'default')
    {
        $this->action = $action;
        $this->form = $form;
        $this->type = $type;
        $this->method = strtoupper($method);
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.buttons.form-button');
    }
}
