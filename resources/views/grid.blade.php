@php
require_once(public_path() ."/phpGrid_Lite/conf.php");
$dg = new C_DataGrid("SELECT * FROM time_sheets");
$dg->enable_edit("INLINE", "CRUD");
$dg -> display();
@endphp
