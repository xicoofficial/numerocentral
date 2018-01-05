<?php
/*
    dpi-upload.php
    (C) 2018 by Jose Solares (jsolares@codevoz.com)

    This file is part of numerocentral.

    numerocentral is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    NumeroCentral is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with NumeroCentral.  If not, see <http://www.gnu.org/licenses/>.

    Upload a file with the ID of the user.
*/

include 'db.inc.php';
include 'prepend_admin.php';

$userid = $user->requireAuthentication( "displayLogin" );

$db = new DB_Sql("mysql", "localhost", "numerocentral", "root", "");

$file = $_FILES['dpipdf']['tmp_name'];

getpost_ifset( array("accountcode") );

$path = "/var/spool/asterisk/dpi/";

$path .= "$accountcode.pdf";
move_uploaded_file($file, $path);

Header('Location:https://www.numerocentral.com/admin.php');
?>
