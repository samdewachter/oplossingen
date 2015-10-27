<?php

	/**
	* 
	*/
	class HTMLBuilder
	{
		protected $header;
		protected $body;
		protected $footer;
		
		function __construct($header, $body, $footer)
		{
			$this->header = $header;
			$this->body = $body;
			$this->footer = $footer;
		}

		public function buildHeader()
		{
			include('html/' . $this->header . ".html");
			include('css/style.css');
		}

		public function buildFooter()
		{
			include('html/' . $this->footer . ".html");
		}

		public function buildBody()
		{
			include('html/' . $this->body . ".html");
		}
	}

?>