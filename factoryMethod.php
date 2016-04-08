<?php
namespace FactoryMethod;


interface  Figure{
    public function drawFirstMethod();
    public function drawSecondMethod();
}

class Circle implements Figure{
    protected $param1;
    protected $param2;

    public function __construct($params){
        $this->param1 = $params['param1'];
        $this->param2 = $params['param2'];
    }
    public function drawFirstMethod(){
        echo 'I draw the circle first method';
    }
    public function drawSecondMethod(){
        echo 'I draw the circle second method';
    }
}

class Rectangle implements Figure{
    
    protected $param1;
    protected $param2;

    public function __construct($params){
        $this->param1 = $params['param1'];
        $this->param2 = $params['param2'];
    }
    
    public function drawFirstMethod(){
        echo 'I draw the rectangle first method';
    }
    public function drawSecondMethod(){
        echo 'I draw the rectangle second method';
    }
}


class GraphicsEditor{
    protected $figures;
    
    public function main($figures){
        foreach ( $figures as $key => $obj ){
            $this->figures[$key] = $this->getObject($obj['type'],$obj['params']);
            switch ($obj['method']){
                case 1:
                    $this->figures[$key]->drawFirstMethod();
                    break;
                case 2:
                    $this->figures[$key]->drawSecondMethod();
                    break;
            }
        }
    }
    
    protected function getObject($type,$params){
        switch( $type ){
            case 'circle':
                $obj = new Circle($params);
                break;
            case 'rectangle':
                $obj = new Rectangle($params);
                break;
            
        }
        return $obj;
    }
}

$shapes = [ 
    ['type' => 'circle', 'method' => 1,'params' => ['param1' => 0, 'param2' => 1]],
    ['type' => 'circle', 'method' => 2,'params' => ['param1' => 0, 'param2' => 1]]
];

$editor = new GraphicsEditor();
$editor->main($shapes);

?>
