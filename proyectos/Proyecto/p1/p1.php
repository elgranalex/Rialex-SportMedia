<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<meta http-equiv="Content-Type" 
        content="text/html; charset=utf-8" />
		<title>Pruebas</title>
		<link rel="stylesheet" 
        type="text/css" 
        href="./p1.css" 
        media="screen" /> 	
</head>
<body>
  <header id="header">
        <nav class="links" style="--items: 5;">
            <a href="#">Link 1</a>
            <a href="#">Link 2</a>
            <a href="#">Link 3</a>
            <a href="#">Link 4</a>
            <a href="#">Link 5</a>
            <span class="line"></span>
        </nav>
    </header>

    <div class="content">
        <strong>Pros</strong>
        <ul>
            <li>It's pure CSS.</li>
        </ul>
        <strong>Cons</strong>
        <ul>
            <li>It's pure CSS.</li>
            <li>All links need to have a consistent dimensions for this to work</li>
            <li>You have to set everything up yourself in terms of telling the nav how many items there are and where the <code>.line</code> should move to whenever one of the links gets hovered.</li>

        </ul>
        <strong>Notes</strong>
        <ul>
            <li>This uses Custom Properties, Calc, and Grid.</li>
            <li>While I couldn't find an easier way to make the line work with unevenly sized links, I tried my best to compensate for it by including the <code>--width</code> and <code>--left</code> custom properties, both of which would take priority over the current setup should either be defined.</li>
        </ul>
    </div>
</body>
</html>