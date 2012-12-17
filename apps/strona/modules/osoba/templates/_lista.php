<div id="users-contain" class="ui-widget">
    <table id="" class="ui-widget ui-widget-content">
        <thead>
            <tr class="ui-widget-header ">
                 <th>Lp.</th>
                <th>Immie </th>
                <th>Nazwisko </th>
                <th>dochód</th>
                <th>ziemia</th>
                <th>dochód z ziemi</th>
                <th>akcja</th>
            </tr>
                <?php foreach ($osoby as $osoba): ?>
            <tr>
                 <td><?php echo $osoba->getId(); ?></td>
                <td><?php echo $osoba->getImmie() ?></td>
                <td><?php echo $osoba->getNazwisko(); ?></td>
                <td>
                <a href="<?php echo url_for('/ug/web/formulasz/dochud?id='.$osoba->id.'&id_r='.$osoba->getRodzinayId()) ?>">
                    <?php  if($osoba->dochod()){
                                echo $osoba->dochod();
                            }else{ echo 0 ;}
                    ?>
                </a></td>
                <td><div class="ziemia"><?php echo $osoba->getZiemia(); ?></div></td>
                <td><?php  echo  $osoba->dochodZiemia(); ?></td>
                <td >
                    <div  style="width:150px;">
                    <button class="usun-osobe">Uduń</button> 
                    <button class="dochod-osoba">Dochod</button> 
                    </div>
                </td>
            </tr>
            <?php endforeach   ?>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>