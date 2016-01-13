<?php 
    $message = "";
    $query = "";
    $order = array();
    
    
    try{
        $db = new PDO('mysql:host=localhost;dbname=bieren','root','');
        
        if (isset($_GET['orderby']))
        {
            $order = explode('-',$_GET['orderby']);
            $query = 'ORDER BY '.$order[1].' '.$order[0];
            
            
        }
        
        $queryString = 'SELECT bieren.biernr, bieren.naam, brouwers.brnaam, soorten.soort, bieren.alcohol 
                        FROM bieren 
                        INNER JOIN brouwers
                        ON bieren.brouwernr = brouwers.brouwernr 
                        INNER JOIN soorten 
                        ON bieren.soortnr = soorten.soortnr '
                        .$query;
        
        $statement = $db->prepare($queryString);
        $statement->execute();
        
        $data = array();
        while ( $row = $statement->fetch(PDO::FETCH_ASSOC) )
        {
            $data[] =   $row;
        }        
        
        $columnNames = array();        
        $bier =0;
        foreach( $data[0] as $key => $brouwer )
        {
           
            $columnNames[$bier]['naam']    =   $key;
            if ($order[1] == $key)
            {
                if ($order[0] == 'DESC')
                {
                    $columnNames[$bier]['order'] = 'ASC';
                } 
                else
                {
                    $columnNames[$bier]['order'] = 'DESC';
                }
                    
            } 
            else
            {
                $columnNames[$bier]['order'] = 'DESC';
            }
            
            $bier++;
           
            
        }
    }
    
    catch (PDOException $e){
        $message = 'Er ging iets mis: '.$e->getmessage();
    }
    
?>
<!DOCTYPE html>
<html>
    <style>
        .odd{
            background-color: grey;
        }
    </style>
    <body>
        <h2>Opdracht CRUD query - order by</h2>

        <?= $message ?>

        <table>
            <thead>
                <?php foreach ($columnNames as $key => $value):?>
                    <th>

                    	<a href="oplossing-opdracht-CRUD-orderby.php?orderby=<?= $value['order'] ?>-<?= $value['naam'] ?>" ><?= $value['naam'] ?>
                    		
                    		<?php if( $value['order'] == 'DESC' && $order[1] == $value['naam'] ):?>
	                    		<img src="icon-desc.png">
	                    		<?php elseif($value['order'] == 'ASC' && $order[1] == $value['naam']) : ?>
	                    		<img src="icon-asc.png">
                   			<?php endif ?>

                   		</a>

                    </th>
                <?php endforeach ?>
            </thead>
            <tbody>
                        <?php foreach ($data as $row => $value): ?> 
                            <?php if($row%2 !=0 ): ?>
                                <tr class="odd">
                            <?php else: ?>
                                <tr>
                            <?php endif ?>
                                    <?php foreach($value as $key =>$columnValue): ?>
                                        <td><?= $columnValue ?></td>
                                    <?php endforeach ?>
                                </tr>
                        <?php endforeach ?>

                    </tbody>
        </table>
    </body>
</html>