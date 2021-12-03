<?php

interface IGraphic
{
    public function draw(): void;
}

class OpenGL_Graphic implements IGraphic
{
    public function draw(): void
    {
        echo 'Draw graphic with OpenGL';
    }
}

class Direct3D_Graphic implements IGraphic
{
    public function draw(): void
    {
        echo 'Draw graphic with Direct3D';
    }
}

interface IRender
{
    public function graphic(): IGraphic;
}

class OpenGL_Render implements IRender
{
    public function graphic(): IGraphic
    {
        return new OpenGL_Graphic();
    }
}

class Direct3D_Render implements IRender
{
    public function graphic(): IGraphic
    {
        return new Direct3D_Graphic();
    }
}

$renderName = 'Direct3D';
$renderType = $renderName === 'Direct3D' ?
    new Direct3D_Render() :
    new OpenGL_Render();

$renderType->graphic()->draw();
