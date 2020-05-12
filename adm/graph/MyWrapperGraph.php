<?php
require_once 'jpgraph/src/jpgraph.php';
/**
 * class MyWrapperGraph
 *
 * @author Carlos Belisario <carlos.belisario.gonzalez@gmail.com>
 * @version 2.0
 */
class MyWrapperGraph 
{
    /**
     *
     * @var jpgraph/Graph
     */
    private $jpgraph;
    
    /**
     *
     * @var array 
     */
    private $data;
    
    /**
     *
     * @var array 
     */
    private $size;
    
    /**
     *
     * @var array
     */
    private $style;


    public function __construct(){}    
    
    /**
     *
     * @return array|
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     *
     * @param array $style
     * @return \MyWrapperGraph 
     */
    public function setStyle(array $style)
    {
        $this->style = $style;
        return $this;
    }

    /**
     *
     * @return Graph 
     */
    public function getJpgraph()
    {
        return $this->jpgraph;
    }
    
    /**
     *
     * @param Graph $jpgrap 
     */
    public function setJpgraph(Graph $jpgrap = null) 
    {
        if(is_null($jpgrap)) {            
            $this->jpgraph = new Graph($this->size['width'], $this->size['height']);
        }else {
            $this->jpgraph = $jpgrap;
        }
        return $this;
    }
    /**
     *
     * @return array 
     */
    public function getData()
    {
        return $this->data;
    }
    
    /**
     *
     * @param array $data 
     */
    public function setData(array $data)
    {
        foreach($data as $k => $v) {
            if(!is_numeric($k)) {
                $keys[] = $k;
            }
            $value[] = $v;
        }
        if(!empty($keys)) {
            $this->data =  array(
                'labels' => $keys,
                'values' => $value
            );
        } else {
            $this->data = array('values' => $value);
        }
        return $this;
    }
    
    /**
     *
     * @return array
     */
    public function getSize()
    {
        return $this->size;       
    }
    

    /**
     *
     * @param array $size 
     * @throws Exception 
     */
    public function setSize(array $size)
    {
        if(!array_key_exists('width', $size) || !array_key_exists('height', $size)) {
            throw new Exception("the array does not contain the necessary keys");
        } else {
            $this->size = $size;
        }
        return $this;
    }
    
    

     /**
     *
     * @param bool $show
     * @param String $title
     * @return String
     * @throws Exception if the $data is empty
     */
    public function createPieGrap($show = true, $title = '', $nameGraph = '')
    {
        require_once "jpgraph/src/jpgraph_pie.php";        
        require_once 'jpgraph/src/jpgraph_pie3d.php';
        
        if(empty($this->data)) {
            throw new Exception("the atribute data is empty");
        } 
        $size = $this->getSize();        
        $datas = $this->getData();
        $graph = new PieGraph($size['width'], $size['height']);
        if(!empty($titulo)) {
            $graph->title->Set($titulo);
        }
        foreach($datas['values'] as $val) {            
            $colors[] = $val[1];
            $data[] = $val[0];
        }        
        $pie3dPlot = new PiePlot3D($data);        
        $pie3dPlot->SetSliceColors($colors);        
        $pie3dPlot->SetLegends($datas['labels']);        
        $pie3dPlot->SetLabelMargin(15);
        $graph->Add($pie3dPlot);        
        
        if($show) {
            $graph->Stroke();         
        } else {
            $graph->Stroke("$nameGraph.png");         
            chmod($nameGraph . ".png", 0777);
            return $nameGraph . ".png";
        }        
        
    }
    
    /**
     *
     * @param bool $show if is true show the graph else save the graph
     * @param string $title title of the graph 
     * @param string $nameGraph name for save the file
     * @return string or graph-image
     * @throws Exception if the data is empty
     */
    public function createLineGraph($show = true, $title = '', $nameGraph = '')
    {
        require_once "jpgraph/src/jpgraph_line.php";        
        if(empty($this->data)) {
            throw new Exception("The data is empty");
        }
        $graph = $this->getJpgraph();
        $graph->SetScale('intlin');
        if(!empty($titulo)) {
            $graph->title->Set($title);
        }

        $data = $this->getData();
        $linePlot = new LinePlot($data['values']);
        $graph->Add($linePlot);
        if($show) {
            $graph->Stroke();
        } else {
            $graph->Stroke($graphName . 'png');
            return $nameGraph . ".png";
        }
    }
    
    /**
     *
     * @param array $yaxisScale
     * @param bool $show
     * @param string $title
     * @param string $nameGraph
     * @return string or image-graph
     * @throws Exception 
     */
    public function createBarGraph(array $yaxisScale = array(0,30,60,90,120,150), $show = true, $title = '', $nameGraph = '')   
    {
        require_once 'jpgraph/src/jpgraph.php';
        require_once 'jpgraph/src/jpgraph_bar.php';

$grafica = new Graph(500, 400);
$grafica->img->SetMargin(50,40,20,0);

$grafica->SetScale("textlin", 5, 10);

//Asigna el titulo al grafico
$grafica->title->Set("Calificaciones");

//Asigna el titulo al eje x
$grafica->xaxis->SetTitle("Alumnos");

//Asigna el titulo y alineacion al eje y
$grafica->yaxis->SetTitle("Calificaciones","middle");

//Asigna las etiquetas para los valores del eje x
$grafica->xaxis->SetTickLabels(array("Ana","Sonia","Sebastian","Joel"));

//crea una serie para un grafico de barras
$fisica = new BarPlot(array(9,8,10,9));

//asigna la leyenda para la serie fisica
$fisica->SetLegend("Fisica");

//asigna el color de relleno de las barras en formato hexadecimal
$fisica->SetFillColor("#E234A9");

//crea una serie para el grafico de barras
$matematicas = new BarPlot(array(8,10,9,10));

//asigna la leyenda para la serie matematicas
$matematicas->SetLegend("Matematicas");

//asigna el color de relleno de las barras con el nombre del color
$matematicas->SetFillColor("blue");

//crea una serie para el grafico de barras
$quimica = new BarPlot(array(10,9,9,8));

//asigna la leyenda para la serie quimica
$quimica->SetLegend("Quimica");

/*asigna el color de relleno de las barras, en este caso un relleno
degradado vertical que va de naranja a rojo, los tipos de degradado
los encuentras en la documentación*/
$quimica->SetFillgradient('orange','red',GRAD_VER); 

// agrupa las series del grafico
$materias = new GroupBarPlot(array($fisica,$matematicas,$quimica));

//agrega al grafico el grupo de series
$grafica->Add($materias);

//muestra el grafico
            $grafica->Stroke($nameGraph . '.png');
            chmod($nameGraph . ".png", 0777);
            return $nameGraph . ".png";
           
    }
}
?>
