<?php
namespace Visitor;

interface  Figure{
    public function acceptFirstMethod(Visitor $visitor);
    public function acceptSecondMethod(Visitor $visitor);
}

class Circle implements Figure{
    protected $param1;
    protected $param2;

    public function __construct($params){
        $this->param1 = $params['param1'];
        $this->param2 = $params['param2'];
    }
    
    public function acceptFirstMethod(Visitor $visitor){
        $visitor->drawFirstMethod($this);
    }
    public function acceptSecondMethod(Visitor $visitor){
        $visitor->drawSecondMethod($this);
    }
}

class Rectangle implements Figure{
    protected $param1;
    protected $param2;

    public function __construct($params){
        $this->param1 = $params['param1'];
        $this->param2 = $params['param2'];
    }
    
    public function acceptFirstMethod(Visitor $visitor){
       $visitor->drawFirstMethod($this);
    }
    public function acceptSecondMethod(Visitor $visitor){
        $visitor->drawSecondMethod($this);
    }
}

interface Visitor{
    public function drawFirstMethod(Figure $figure);
    public function drawSecondMethod(Figure $figure);
}

class GraphicsEditor implements Visitor{
    protected $figures;
    
    public function main($figurs){
        foreach ( $figurs as $key => $obj ){
            $this->figures[$key] = $this->getObject($obj['type'],$obj['params']);
            switch ($obj['method']){
                case 1:
                    $this->figures[$key]->acceptFirstMethod($this);
                    break;
                case 2:
                    $this->figures[$key]->acceptSecondMethod($this);
                    break;
            }
        }
    }
    
    public function drawFirstMethod(Figure $figure){
        if( $figure instanceof Circle){
             echo 'I draw the circle first method';
        }
        if( $figure instanceof Rectangle){
             echo 'I draw the rectangle first method';
        }
    }
    
    public function drawSecondMethod(Figure $figure){
        if( $figure instanceof Circle){
             echo 'I draw the circle second method';
        }
        if( $figure instanceof Rectangle){
             echo 'I draw the rectangle second method';
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

$obj = new GraphicsEditor();
$obj->main($shapes);


?>
