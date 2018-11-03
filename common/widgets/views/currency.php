<div class="exchange-rates-block" data-name="exchange-rates-block">
    <div title="Курси валют на&nbsp;<?=date('d.m.Y H:i:s')?>">
        <?  foreach ($currency as $cur){ ?>
            <div class="exchange-rates-block-section">
                <div class="exchange-rates-block-section-content type"> <?=$cur->name?>: </div>
                <div class="exchange-rates-block-section-content">  <?=$cur->buy_rate?>&nbsp;/&nbsp;<?=$cur->selling_rate?>  </div>
            </div>
        <?  } ?>
    </div>
</div>



