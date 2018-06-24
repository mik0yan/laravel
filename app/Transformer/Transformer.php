<?php
namespace App\Transformer;


abstract class Transformer {

    public function TransformerCollection($items)
    {
        return array_map([$this,'Transform'],$items);
    }

    public abstract function Transform($item);
}
