<div id="users-contain" class="ui-widget">
    <table id="" class="ui-widget ui-widget-content">
        <thead>
            <tr class="ui-widget-header ">
                 <th>Lp.</th>
                <th>zakres </th>
                <th>uczniowie</th>
            </tr>
            <?php foreach ($stawki as $stawka): ?>
            <tr>
                 <td>Lp.</td>
                <td> <?php echo $stawka->getTyp();?></td>
                <td><?php  echo  $stawka->getWartosc(); ?> zł</td>
            </tr>
            <?php endforeach   ?>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>