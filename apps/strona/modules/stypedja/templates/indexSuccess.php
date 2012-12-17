<div id="users-contain" class="ui-widget">
    <table id="" class="ui-widget ui-widget-content">
        <thead>
            <tr class="ui-widget-header ">
                 <th>Lp.</th>
                <th>zakres </th>
                <th>uczniowie</th>
            </tr>
            <?php foreach ($stypedja as $zakres): ?>
            <tr>
                 <td>Lp.</td>
                <td> <?php echo $zakres->getTyp();?></td>
                <td><?php  echo  $zakres->getOsoby(); ?></td>
            </tr>
            <?php endforeach   ?>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<?php include_component('stawka', 'lista') ?>
