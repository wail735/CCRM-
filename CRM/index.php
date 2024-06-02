<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Modern Login Page | AsmrProg</title>
</head>
<style>
    .error{
    background: #F2DEDE;
    color:#A94442;
    padding: 10px;
    width : 99%;
    border-radius: 5px;
}
input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
.error1{
    background: #F2DEDE;
    color:#A94442;
    padding: 10px;
    width : 99%;
    border-radius: 5px;
}
.succes{
    background: #D4EDDA;
    color:#40754C;
    padding: 10px;
    width : 99%;
    border-radius: 5px;
}
.container {
    background-color: #fff;
    border-radius: 30px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
    position: relative;
    overflow: hidden;
    width: 768px;
    max-width: 100%;
    min-height: 580px;
}
</style>
<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="signup.php" method="post">
                <h1>Create Account</h1>
                
                <?php
                 if(isset($_GET['error1'])){?>
                  <p class="error1"><?php echo $_GET['error1']; ?></p>
               <?php }?>
               <?php
                 if(isset($_GET['succes'])){?>
                  <p class="succes"><?php echo $_GET['succes']; ?></p>
               <?php }?>
               <?php
                if(isset($_GET['name'])){?>
                   <input type="text"
                          name="name"
                          placeholder="Nom"
                          value="<?php echo $_GET['name']; ?>"><br>
                         <?php }else{?>
                                <input type="text"
                                       name="name"
                                       placeholder="Nom"><br>  
                        <?php }?> 
                        <?php
            $wilayas = [
                "Adrar", "Chlef", "Laghouat", "Oum El Bouaghi", "Batna", "Béjaïa", "Biskra", "Béchar", "Blida", "Bouira", 
                "Tamanrasset", "Tébessa", "Tlemcen", "Tiaret", "Tizi Ouzou", "Alger", "Djelfa", "Jijel", "Sétif", "Saïda", 
                "Skikda", "Sidi Bel Abbès", "Annaba", "Guelma", "Constantine", "Médéa", "Mostaganem", "M'Sila", "Mascara", 
                "Ouargla", "Oran", "El Bayadh", "Illizi", "Bordj Bou Arréridj", "Boumerdès", "El Tarf", "Tindouf", "Tissemsilt", 
                "El Oued", "Khenchela", "Souk Ahras", "Tipaza", "Mila", "Aïn Defla", "Naâma", "Aïn Témouchent", "Ghardaïa", 
                "Relizane", "Timimoun", "Bordj Badji Mokhtar", "Ouled Djellal", "Béni Abbès", "In Salah", "In Guezzam", 
                "Touggourt", "Djanet", "El M'Ghair", "El Meniaa"
            ];

            $selected_wilaya = isset($_GET['wilaya']) ? $_GET['wilaya'] : '';
            ?>
                <input type="text" name="prenom" placeholder="prenom">
                <input type="tel" name="telephone" placeholder="telephone">
                <select name="wilaya">
                <option value="">Select Wilaya</option>
                <?php foreach($wilayas as $wilaya) { ?>
                    <option value="<?php echo $wilaya; ?>" <?php echo ($wilaya == $selected_wilaya) ? 'selected' : ''; ?>>
                        <?php echo $wilaya; ?>
                    </option>
                <?php } ?>
            </select>
                <input type="tel" name="bureau" placeholder="bureau">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="ré-password" placeholder="Ré-password">

               
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="login.php" method="post">
                <h1>Login</h1>
                <?php
                 if(isset($_GET['error'])){?>
                  <p class="error"><?php echo $_GET['error']; ?></p>
                 
               <?php }?>
                <input type="text" name="uname" placeholder="user name">
                <input type="password" name="password" placeholder="Password">
                <button type="submit">Login</button>
            </form>
           
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">LOGIN</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>