<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <div class="crumbs">
        <div class="container">
            <ul>
                <li class="first"><a href=".">Home</a></li>
                <li>/</li>
                <?php
                    $class = $this->router->fetch_class();
                    $method = $this->router->fetch_method();
                    switch ($class)
                    {
                        case 'about':
                        case 'contact':
                        case 'livetv':
                        case 'video':
                        case 'alphabet':
                        case 'lessons':
                        case 'news':
                        case 'noun':
                            echo '<li><a href="#">'.t($class).'</a></li>';
                            break;
                    }
                ?>
            </ul>
        </div>
    </div>
