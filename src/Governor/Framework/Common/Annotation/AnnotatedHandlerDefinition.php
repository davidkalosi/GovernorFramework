<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Governor\Framework\Common\Annotation;

/**
 * Description of AbstractAnnotatedHandlerDefinition
 *
 * @author    "David Kalosi" <david.kalosi@gmail.com>  
 * @license   <a href="http://www.opensource.org/licenses/mit-license.php">MIT License</a> 
 */
class AnnotatedHandlerDefinition implements HandlerDefinitionInterface
{   
    
    /**     
     * @var \ReflectionClass
     */
    private $target;
    /**
     *
     * @var \ReflectionMethod
     */
    private $method;
    
    /**     
     * @var string
     */
    private $payloadType;
    
    /**     
     * @var array
     */
    private $methodAnnotations;
    
    function __construct(\ReflectionClass $target, \ReflectionMethod $method, 
            array $methodAnnotations, $payloadType) 
    {
        $this->target = $target;
        $this->method = $method;
        $this->methodAnnotations = $methodAnnotations;
        $this->payloadType = $payloadType;
    }

    public function getMethod() 
    {
        return $this->method;
    }
    
    public function getMethodAnnotations()
    {
        return $this->methodAnnotations;
    }

    public function getPayloadType() 
    {
        return $this->payloadType;
    }

    public function getTarget() 
    {
        return $this->target;
    }

}
