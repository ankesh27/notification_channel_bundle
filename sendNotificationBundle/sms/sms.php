<?php

class Sms
{
    /**
     * @var array $_to
     */

    protected $_to = array();

    
    /**
     * @var string $_message
     */
    protected $_message;
    
    
    /**
     * Named constructor.
     *
     * @return static
     */
    public static function make()
    {
        return new Sms();
    }

    /**
     * __construct
     *
     * Resets the class properties.
     */
    public function __construct()
    {
        $this->reset();
    }
    
    /**
     * reset
     *
     * Resets all properties to initial state.
     *
     * @return self
     */
    public function reset()
    {
        $this->_to = array();
        $this->_message = null;
        $this->_uid = $this->getUniqueId();
        return $this;
    }
    
    
    /**
     * setTo
     *
     * @param int $number The Phone Number to send to.
     *
     * @return self
     */
    public function setTo($number)
    {
        if(is_numeric($number))
        {
            $this->_to[] = "+".$number;
        }else
        {
            $this->_to[] = $number;
        }
        return $this;
    }

    /**
     * getTo
     *
     * Return an array of formatted To addresses.
     *
     * @return array
     */
    public function getTo()
    {
        return $this->_to;
    }
    
    
    /**
     * setMessage
     *
     * @param string $message The message to send.
     *
     * @return self
     */
    public function setMessage($message)
    {
        $this->_message = $message;
        return $this;
    }
    
    /**
     * getMessage
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->_message;
    }
    
    
    
    public function getUniqueId()
    {
        return md5(uniqid(time()));
    }
    
    /**
     * send
     *
     * @return boolean
     * @throws \RuntimeException on no 'To: ' address to send to.
     */
    public function send()
    {
        $to = $this->getToForSend();
        
        if (empty($to)) {
            throw new \RuntimeException(
                'Unable to send, no To address has been set.'
            );
        }


        return $this->someSmsSendAPI($to, $this->_message);
    }
    
    /**
     * getToForSend
     *
     * @return string
     */
    public function getToForSend()
    {
        if (empty($this->_to)) {
            return '';
        }
        return $this->_to;
    }
    
    /**
     * Use some SEND sms API to send SMS
     * @param string $to
     * @param string $message
     * @return bool
     */
    private function someSmsSendAPI($to, $message)
    
    {
        return true;
        
    }
    
}

?>