#!/usr/bin/env php
<?php

$port = getenv('port') ?: 8000;

$return = exec("bin/console server:start 127.0.0.1:$port", $output, $return);
echo implode("\n", $output);
