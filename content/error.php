<head>
    <link rel="stylesheet" href="content/css/error.css">

</head>
<div id="page">
    <div id="container">
        <h1>:(</h1>
        <h2>Es wurde ein Fehler festgestellt, zu ihrer Sicherheit wird diese Seite angezeigt.
        <h2>
            <span id="percentage">0</span>% abgeschlossen</h2>
        <div id="details">
            <div id="qr">
                <div id="image">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Rickrolling_QR_code.png" alt="QR Code" />
                </div>
            </div>
            <div id="stopcode">
                <h4>Für weitere Information zu Vorfall betrachten Sie bitte
                    <br/>etc/error.log</h4>
                <h5>Zeitpunkt des Fehlers:
                    <br/><?php echo date('d.m.Y H:i:s', time())?></h5>
            </div>
        </div>
    </div>
</div>
<script src="content/js/error_percent_count.js"></script>