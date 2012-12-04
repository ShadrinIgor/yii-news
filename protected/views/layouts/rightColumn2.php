<div id="MRight">
    <br/>
    <br/>
    <div class="ML_block_big">
        <h2>Афиши и Анонсы</h2>
        <?php $this->widget('blocksAnoncWidget'); ?>
    </div>
    <div class="ML_block_big">
        <h2>Видео новости</h2>
        <?php $this->widget('blocksNewsVideoWidget'); ?>
    </div>

    <div class="ML_block">
        <div class="BML_title">Популярные новости дня</div>
       <?php $this->widget('blocksNewsWidget'); ?>
    </div>
    <div class="ML_block">
        <div class="BML_title">Новости недели</div>
        <?php $this->widget('blocksWeekNewsWidget' ); ?>
    </div>
</div>