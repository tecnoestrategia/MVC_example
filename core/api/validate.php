<?php
if ($request->getMethod() !== 'GET') {
    http_response_code(405);
    exit('Use GET method.');
}
 
