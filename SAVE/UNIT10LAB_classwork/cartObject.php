<?php

    class cartObject implements Serializable {
        
        private $code;
        private $name;
        private $price;
        private $quantity;
        
        public function setCode ($code){
            $this->code = $code;
        }
        
        public function getCode (){
            return $this->code;
        }
        
        public function setName ($name){
            $this->name = $name;
        }
        
        public function getName (){
            return $this->name;
        }
        
        public function setPrice ($price){
            $this->price = $price;
        }
        
        public function getPrice (){
            return $this->price;
        }
        
        public function setQuantity ($quantity){
            $this->quantity = $quantity;
        }
        
        public function getQuantity (){
            return $this->quantity;
        }
        
        public function serialize(){
            return serialize(array("code"=>$this->code, "name"=>$this->name, "price"=>$this->price, "quantity"=>$this->quantity));
        }
        
        public function unserialize($data){
            $data = unserialize($data);
            $this->code = $data['code'];
            $this->name = $data['name'];
            $this->price = $data['price'];
            $this->quantity = $data['quantity'];
        }
    
    }
?>