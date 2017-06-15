<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>JSON PHP</title>
    </head>
    <body>
        <form name="form1" id="form1" method="POST" enctype="multipart/form-data">
            <input type="file" name="jsonfile" id="jsonfile" accept=".json" onchange="document.getElementById('form1').submit()" />
        </form>
        <hr />
        <form name="form2" id="form2" method="POST">
            <textarea style="width: 100%; height: 200px;" name="textjson" id="textjson"><?php
                if (isset($_POST['textjson'])) {
                    echo $_POST['textjson'];
                } elseif (isset($_FILES['jsonfile'])) {
                    echo file_get_contents($_FILES['jsonfile']['tmp_name']);
                }
                ?></textarea><br />
            <input type="submit" name="buildtable" id="buildtable" value="Build Table" />
        </form>
        <hr />
        <?php
        if (isset($_POST['textjson'])) {
            ?>
            <table style="width: 100%" border="1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NRP</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $json_array = json_decode($_POST['textjson'], true);
                    foreach ($json_array as $json_value) {
                        ?>
                        <tr>
                            <td style="text-align: center"><?= $json_value['no'] ?></td>
                            <td style="text-align: center"><?= $json_value['nrp'] ?></td>
                            <td><?= $json_value['nama'] ?></td>
                            <td><?= $json_value['jurusan'] ?></td>
                            <td><?= $json_value['jenis kelamin'] ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php
        }
        ?>
    </body>
</html>
