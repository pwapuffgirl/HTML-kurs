<form id=form action="register.php" method="POST">
    <div class="formcontainer">

        <div class="_col"> <label> Förnamn </label></div>
        <div class="_col"> <input type="text" name="firstname" /> </div>
        <div class="_col"> <label> Efternamn </label></div>
        <div class="_col"> <input type="text" name="lastname" /> </div>
        <div class="_col"> <label> Ålder </label></div>
        <div class="_col"> <input type="text" name="age" size="2" /> år</div>
        <div class="_col"> <label>Badmössa:</label></div>
        <div class="_col">
            <select name="swimming_cap">
                <option value="" disabled selected>Färg...</option>
                <option value="Yellow">Gul</option>
                <option value="Green">Grön</option>
                <option value="Red">Röd</option>
                <option value="Pink">Rosa</option>
                <option value="Purple">Lila</option>
            </select>
        </div>
        <div class="_col"> <label>Simkunnig:</label></div>
        <div class="_col">
            <select name="swimming_knowledge">
                <option value="" disabled selected>Ja/Nej...</option>
                <option value="true">Ja</option>
                <option value="false">Nej</option>
            </select>
        </div>
        <div class="_col"> <label>Simsträcka:</label></div>
        <div class="_col">
            <select name="distance">
                <option value="" disabled selected>Längd...</option>
                <option value="200">200m</option>
                <option value="400">400m</option>
                <option value="1000">1000m</option>
            </select>
        </div>
        <div class="_col"> <label> Fritextfält</label></div>
        <div class="_col"> <input type="text" name="info" style="padding: 20px 10px;
    line-height: 28px;" /> </div>
        <div class="_col"> <label>Betalat:</label></div>
        <div class="_col">
            <select name="paid">
                <option value="" disabled selected>Ja/Nej...</option>
                <option value="true">Ja</option>
                <option value="false">Nej</option>
            </select>
        </div>
    </div>
    <div class="rubric" style="width: 100%; text-align:right;padding-right:50px;">
        <input type="submit" value="Skicka" name="submit"></input>
    </div>
</form>