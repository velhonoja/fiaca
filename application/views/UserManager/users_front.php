<h1>User Manager</h1>

<h3>Users</h3>

<table>
        <tr style="font-weight: bold;">
            <td><p>Sukunimi</p></td>
            <td><p>Etunimi</p></td>
            <td><p>User ID</p></td>
            <td><p>Toiminnot</p></td>
        </tr>
    
        <?php 
        foreach($users as $user) {
            
            echo "<tr>
            <td><p>" . $user->user_lastname . "</p></td>
            <td><p>" . $user->user_firstname . "</p></td>
            <td><p>" . $user->user_id . "</p></td>
            <td><p>" . anchor("UserManager/edit/" . $user->user_id, "Edit") . "</p></td>
                </tr>";
            
            
        }
            
        ?>
        
        
</table>