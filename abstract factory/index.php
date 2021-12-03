<?php

interface IButton
{
    public function draw(): void;
}

class OpenGL_Button implements IButton
{
    public function draw(): void
    {
        echo 'Draw button with OpenGL';
    }
}

class Direct3D_Button implements IButton
{
    public function draw(): void
    {
        echo 'Draw button with Direct3D';
    }
}

interface ICheckbox
{
    public function draw(): void;
}

class OpenGL_Checkbox implements ICheckbox
{
    public function draw(): void
    {
        echo 'Draw checkbox with OpenGL';
    }
}

class Direct3D_Checkbox implements ICheckbox
{
    public function draw(): void
    {
        echo 'Draw checkbox with Direct3D';
    }
}

interface IRender
{
    public function button(): IButton;
    public function checkbox(): ICheckbox;
}

class OpenGL_Render implements IRender
{
    public function button(): IButton
    {
        return new OpenGL_Button();
    }

    public function checkbox(): ICheckbox
    {
        return new OpenGL_Checkbox();
    }
}

class Direct3D_Render implements IRender
{
    public function button(): IButton
    {
        return new Direct3D_Button();
    }

    public function checkbox(): ICheckbox
    {
        return new Direct3D_Checkbox();
    }
}

class Application
{
    private $render;

    public function __construct(IRender $render)
    {
        $this->render = $render;
    }

    public function draw(): void
    {
        $this->render->button()->draw();
        echo '<br>';
        $this->render->checkbox()->draw();
    }
}

$renderName = 'Direct3D';
$renderType = $renderName === 'Direct3D' ?
    new Direct3D_Render() :
    new OpenGL_Render();

$app = new Application($renderType);
$app->draw();
