<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

        /** Load header from your theme **/
        $this->load->view("{$this->theme}_template/{$this->division}/view_header");
        
        /** Load left bar from your theme **/
        $this->load->view("{$this->theme}_template/{$this->division}/view_leftbar");
        
        /** Load main content from your theme **/
        $this->load->view("{$this->theme}_template/{$this->division}/view_{$main_content}");
        
        /** Load right bar from your theme **/
        $this->load->view("{$this->theme}_template/{$this->division}/view_rightbar");
        
        /** Load footer from your theme **/
        $this->load->view("{$this->theme}_template/{$this->division}/view_footer");