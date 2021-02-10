Här har vi alla sidor som ska administreras. 
Jag tänker att kunddatabasen, meddelandedatabasen och databasen över beställda ordrar. 
Eller ska de ligga på webshop och contactform så länkar vi bara till dem?

Den här delen av projektet bör väl då innehålla ett antal read.php för att skriva ut kunder, ordrar eller meddelanden. 
Jag tänker mig en sida med olika knappar och beroende på vilken du trycker på så visas kunder eller ordrar i utskriften (vi länkar alltså bara till t.ex customer_read.php eller orders_read.php beroende på vad admin trycker på.)
Eller så är det enklare med drop down listor som vi kan kollapsa så de försvinner. Då blir det ju bara en read.php som läser in alla data från orders, customers och messages. 

Även lägga update.php här?

sen en index-sida som läser in alla read och update...