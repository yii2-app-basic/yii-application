<?   use app\models\Currency; ?>
<?   if($account_history_array): ?>
<div id="depositsTable" class="table">
    <div id="tableHead" class="trGroup">
        <div class="th" style="text-align:center;">
            <div class="column10" style="width:1%">Дата транзакції
                <div id="sortNum" class="sort"></div>
            </div>
            <div class="column6" style="padding: 4px 15px 4px 7px">
                <div style="position:relative;">Тип
                </div>
            </div>
            <div class="column14">Розмір транзакції
                <div id="sortName" class="sort"></div>
                <div class="tool depcase">
                </div>
            </div>
            <div class="column20">Залишок після транзакції
                <div id="sortAmount" class="sort"></div>
                <div class="tool depcase">
                </div>
            </div>
            <div class="column2">
                <div id="sortAmount" class="sort">Сума в національній валюті</div>
                <div class="tool depcase">
                </div>
            </div>
        </div>
    </div>
    <div id="tableBody" class="trGroup">
    <?   foreach($account_history_array as $item): ?>
        <div id="26308607335817" class="td at_uah at_state_L " style="text-align:center">
            <div class="column10" style="width:1%"><?=$item['opening_time']?></div>
            <div class="column6" style="white-space:nowrap"><?=$item['operation_name']?></div>
            <div class="column14" style="text-align:right"><?= $item['transaction_value']." ".$item['abbreviation'] ?></div>
            <div class="column20" style="text-align:right"><?= $item['balance after transaction']." ".$item['abbreviation'] ?></div>
            <div class="column2" style="text-align:right"><?= Currency::convertСurrency($item['balance after transaction'],$item['abbreviation'] ,'UAH','selling_rate')  ?> грн.</div>

        </div>
    <?   endforeach; ?>
    </div>
</div>


    <?   else: ?>
<h3>Немає історії по рахунку № <?=$account_number?></h3>
    <?   endif; ?>