<?php namespace DCarbone\AssetManager\Asset\Combined;

// Copyright (c) 2012-2014 Daniel Carbone

// Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"),
// to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense,
// and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

// The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
// FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
// WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

/**
 * Class CombinedScriptAsset
 * @package DCarbone\AssetManager\Asset\Combined
 */
class CombinedScriptAsset extends AbstractCombinedAsset
{
    /**
     * @return string
     */
    protected static function get_file_extension()
    {
        return \asset_manager::$script_file_extension;
    }

    /**
     * Get <script /> tag Output for this file
     *
     * @return string  html Output
     */
    public function generate_output()
    {
        $output = "<script type='text/javascript' language='javascript'";
        $output .= " src='".str_ireplace(array("http:", "https:"), "", $this->get_file_src());
        $output .= '?v='.$this->get_file_version()."'></script>";

        return $output;
    }

    /**
     * @return string
     */
    public function get_file_src()
    {
        $config = \asset_manager::get_config();
        return $config['cache_url'].$this->file_name;
    }
}