<?php
 

class html_form{ 
var $id;
var $name;
var $clase;
var $action;
var $method;
var $enctype;
var $onsubmit;
var $form;
var $input;
var $type;
var $label;
var $value;
var $oForm;
var $cForm;
var $radio;
var $checkbox;
var $select;
var $texto;
var $fieldset;
var $legend;
var $widht;
var $otable;
var $ctable;
var $Fila;
var $column;
var $columnasnum;
var $tableH;
var $header;
var $onchange;
var $class;
 
    
    function openform($name='formInsert', $id='', $clase='', $method='post', $action='#', $enctype='', $onsubmit=''){
        $this->action = $action;
        $this->method = $method;
        $this->name = $name;
        $this->enctype = $enctype;
        $this->onsubmit = $onsubmit;
        $this->id= $id;
        $this->clase=$clase;
        
        $this->oform = "<form name='".$this->name."' id='".$this->id."' class='".$this->clase."' action='".$this->action."' method='".$this->method."' enctype='".$this->enctype."' onsubmit='".$this->onsubmit."'>";
        return $this->oform;
    }
    
 
    function addInput($type, $name, $label='',$value='',$id='', $class=''){
        $this->type = $type;
        $this->name = $name;
        $this->label= $label;
        $this->value = $value;
 
        if($this->type == "submit" || $this->type=="reset"){
            $this->input = "<label></label>";
        }
        else{
            $this->input= "<label>".$this->label."</label>";
        }
        
        $this->input .= "<input type='".$this->type."' name='".$this->name."' value='".$this->value."' id='".$id."' class='".$class."'/>";
        
        return $this->input;
    }
    
    
    function addcheckradio($type,$name,$values,$selected=0){
    
        unset($this->radio);
        
        $this->value = $values;
        $this->selected = $selected;
        $this->type = $type;
        
        if ($this->type=="checkbox"){
            $this->name = $name."[]";
        }
        else{
            $this->name = $name;
        }
        
        $c=1;   
        while(list($val,$l)=each($this->value)){    
            if ($c==$this->selected){
                $this->check = " checked/>";
            }
            else{
                $this->check = " />";
            }
            
            $this->radio .=  "<label>".$this->value[$val]."</label><input type='".$this->type."' name='".$this->name."' value='".$val."'".$this->check."<br>";
            $c++;
        }
        return  $this->radio;
    }
    
    function addTextarea($name, $cols=20, $rows=5, $label='',$value=''){
        $this->name=$name;
        $this->row= $rows;
        $this->col= $cols;
        $this->value = $value;
        $this->label = $label;
        
        $this->textarea = "<label>".$this->label."</label><br><textarea name='".$this->name."' cols='".$this->col."' rows='".$this->row."'>".$this->value."</textarea>";
        return $this->textarea;
    }
 
    function addSelect($name, $texto, $values, $label='', $multiple=0,$funcion="", $id="", $class=""){
        
        $this->values=$values;
        $this->name=$name;
        $this->label=$label;
        $this->id = $id;
        $this->class=$class;
        $this->onchange=$funcion;
        if($multiple==1){
            $this->select = "<label>".$this->label."</label><select name='".$this->name."[]' id='".$this->id."' class='".$this->class."' onchange='".$this->onchange."' multiple='multiple'>";
        }
        else{
            $this->select = "<label>".$this->label."</label><select name='".$this->name."' id='".$this->id."' class='".$this->class."' onchange='".$this->onchange."'>";
        }
        $i=0;
         foreach ($values as $valor) //while(list($values, $text)=each($this->values))
        {   
            $this->select .= "<option value='".$values[$i]."'>".$texto[$i++]."</option>";
        }
            $this->select  .= "</select>";
 
        return $this->select;
    }
    
      
    function openTable($clase,$columnasTitle,$title){
        $this->clase=$clase;
        $this->columnasNum=$columnasTitle;
        $this->titulo=$title;
        $this->otable = "<table class='".$this->clase."' > <tbody>";
        $this->otable .="<tr ><th colspan='".$this->columnasNum."'>".$this->titulo."</th>";
        return $this->otable;
    }
    
    function openHeader($colummnsNums){
        $this->tableH=$colummnsNums;
        $this->header="<th colspan='".$this->tableH."'>";
        return $this->header;
    }
    
    function openColumna($colmnasNum,$contenido=""){
        $this->columnasNum=$colmnasNum;
        $this->column="<td colspan='".$this->columnasNum."'><label>".$contenido."</label>";
        return $this->column;
    }
    
        
    function openFila($id="", $clase=""){
        $this->clase=$clase;
        $this->id= $id;
        $this->Fila ="<tr id='".$this->id."' class='".$this->clase."'>";
        return $this->Fila;
    }
    
    function closeHeader(){
        $this->header="</th>";
        return $this->header;
    }
    
    function closeColumna(){
        $this->column="</td>";
        return $this->column;
    }
    
    function closeFila(){
        $this->cFila = "</tr>";
        return $this->cFila;
    }
    
    function closeTable(){
        $this->ctable = "</tbody></table>";
        return $this->ctable;
    }
    
    function openfieldset($texto,$width='300'){
        $this->legend=$texto;
        $this->width=$width;
        
        $this->fieldset="<fieldset style='width:".$this->width."px;'><legend>".$this->legend."</legend>";
        return $this->fieldset;
    }
    
    function closefieldset(){
        
        $this->fieldset="</fieldset>";
        return $this->fieldset;
    }
    
    function closeform(){
        $this->cform = "</form>";
        return $this->cform;
    }
}
?>