<!DOCTYPE html>
<html>
<head>
	<title>Ninja Gold Game</title>
	<!-- <link rel="stylesheet" type="type/css" href="<?php echo base_url('/assets/css/ninja_gold_game.css')?>"> -->
<style>
*{
    margin: 0px;
    padding: 0px;
}
form{
    width: 200px;
    height: 140px;
    border: 2px solid black;
    display: inline-block;
    text-align: center;
    padding-top: 50px;
    margin-top: 20px;
}
.activities{
    border: 1px solid black;
    width: 825px;
}
.win{
    color: green;
}
.lose{
    color: red;
}
</style>
</head>
<body>
    <h1>Your Gold: <?php echo $this->session->userdata('current_gold'); ?></h1>
    <div>
        <form action="/process_money" method="post">
            <input type="hidden" name="action" value="farm" />
            <h1>Farm</h1>
            <p>(earns 10-20 golds)</p>
            <input type="submit" value="Find Gold!">
        </form>
        <form action="/process_money" method="post">
            <input type="hidden" name="action" value="cave" />
            <h1>Cave</h1>
            <p>(earns 5-10 golds)</p>
            <input type="submit" value="Find Gold!">
        </form>
        <form action="/process_money" method="post">
            <input type="hidden" name="action" value="house" />
            <h1>House</h1>
            <p>(earns 2-5 golds)</p>
            <input type="submit" value="Find Gold!">
        </form>
        <form action="/process_money" method="post">
            <input type="hidden" name="action" value="casino" />
            <h1>Casino!</h1>
            <p>(earns/takes 50 golds)</p>
            <input type="submit" value="Find Gold!">
        </form>
    </div>
    Activities:
    <div class='activities'>
<?php   if($this->session->userdata('activities') !== null)
        {
            foreach ($this->session->userdata('activities') as $activity) 
            {
                echo $activity;
            }
        } ?>
    </div>
</body>
</html>