<div id="users-contain" class="ui-widget">
    <table id="users" class="ui-widget ui-widget-content">
        <thead>
            <tr class="ui-widget-header ">
                 <th>Lp.</th>
                <th>Typ</th>
                <th>dochod</th>
                <th>akcja</th>
            </tr>
            <?php foreach ($dochody as $dochod): ?>
            <tr>
                 <td><?php echo $dochod['id'] ?></td>
                <td><?php echo $dochod['typ'] ?></td>
                <td><?php echo $dochod['wartosc'] ?></td>
                <td>
                    <div>
                    <button class="usun-dr">Uduń</button> 
                    <button class="edytuj-dr">Edtyuj</button> 
                    </div>
                </td>
            </tr>
            <?php endforeach   ?>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<button id="create-dr">Plus</button> 
