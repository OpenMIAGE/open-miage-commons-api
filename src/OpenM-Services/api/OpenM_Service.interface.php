<?php

/**
 * OpenM_Service contains common constants and method required for all Open API.
 * @package OpenM 
 * @subpackage OpenM\OpenM-Services\api
 * @copyright (c) 2013, www.open-miage.org
 * @license http://www.apache.org/licenses/LICENSE-2.0 Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *     http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * @link http://www.open-miage.org
 * @author Gaël Saunier
 */
interface OpenM_Service {
    const RETURN_ERROR_PARAMETER = "ERROR";
    const RETURN_ERROR_CODE_PARAMETER = "ERROR_CODE";
    const RETURN_VOID_PARAMETER = "VOID";
    const RETURN_ERROR_MESSAGE_PARAMETER = "ERROR_MESSAGE";
    const RETURN_STATUS_PARAMETER = "STATUS";
    const RETURN_STATUS_OK_VALUE = "OK";
    const RETURN_ERROR_MESSAGE_ONLY_CALLABLE_BY_API_VALUE = "Restricted to API usage only";
    const RETURN_ERROR_MESSAGE_ONLY_CALLABLE_BY_USER_VALUE = "Restricted to USER usage only";
    const RETURN_ERROR_MESSAGE_UNKNOWN_VALUE = "Unknown error occurs";
    
    const TRUE_PARAMETER_VALUE = 1;
    const FALSE_PARAMETER_VALUE = 0;
}
?>