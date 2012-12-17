<div id="users-contain" class="ui-widget">
    <table id="" class="ui-widget ui-widget-content">
        <thead>
            <tr class="ui-widget-header ">
                 <th>Lp.</th>
                <th>Nazwisko </th>
                <th>liczba</th>
                <th>Dochód</th>
                
                <th>
                    <div  style="width:110px;">Dochód na osobe</div>
                </th>
                <th>Zakres</th>
                <th>
                    <div  style="width:110px;">Liczba uczniw</div>
                </th>
                <th>Decyzja</th>
                <th>akcja</th>
            </tr>
            <?php foreach ($rodziny as $rodzina): ?>
            <tr>
                 <td><?php  echo $rodzina->getId(); ?></td>
                <td><a href="<?php echo url_for('/ug/web/formulasz/osoba?id_r='.$rodzina->id); ?>"><?php echo $rodzina->getNazwisko() ?></a></td>
                <td><?php  echo $rodzina->liczba_osub(); ?></td>
                <td><?php  echo $rodzina->dochod(); ?></td>
                <td><?php  
                    if($rodzina->liczba_osub() != 0){
                       echo $rodzina->dochod() / $rodzina->liczba_osub();
                     }else{
                         echo 0;
                     }
                ?></td>
                <td><?php  echo $rodzina->zakres(); ?></td>
                <td><?php  echo $rodzina->liczba_uczniow(); ?></td>
                <td>
                    <a href=" http://127.0.0.1/tcpdf/examples/example_008.php?id=<?php echo $rodzina->id; ?>">Decyzja</a>
                <td >
                    <div  style="width:150px;">
                    <button class="usun-rodzina">Uduń</button> 
                    </div>
                </td>
            </tr>
            <?php endforeach   ?>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>