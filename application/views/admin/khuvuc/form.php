<?php
if (isset($data))
{
	
}
else {
	$data=0;
}

echo form_open();
echo "<table Align='center'>";

echo "<tr>";
echo "<td>";
echo "Mã tỉnh:";
echo "</td>";
echo "<td>";
echo form_input('T_MA', set_value('T_MA', $data['T_MA']));
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Tên tỉnh:";
echo "</td>";
echo "<td>";
echo form_input('T_TEN', set_value('T_TEN', $data['T_TEN']));
echo "</td>";
echo "</tr>";


echo "<tr>";
echo "<td>";
echo "</td>";
echo "<td>";
echo form_submit('submit','Lưu');
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td colspan=2>";
echo validation_errors();
echo "</td>";
echo "</tr>";

echo "</table>";
?>
