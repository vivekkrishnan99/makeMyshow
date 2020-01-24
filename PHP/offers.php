<?php
    $con = mysqli_connect('127.0.0.1','root','');
    if(!$con)
    {
        echo 'Not Connected to Server';
    }
    if(!mysqli_select_db($con,'makemyshow'))
    {
        echo 'Database not selected.';
    }
    else
    {
        $sql="SELECT * from offers";
        if($result=mysqli_query($con,$sql))
        {
            if(mysqli_num_rows($result))
            {
                echo "<html>
                        <head>
                            <style>
                            table {
                                font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
                                border-collapse: collapse;
                                width: 100%;
                              }
                              
                              td,th {
                                border: 1px solid #ddd;
                                padding: 8px;
                              }
                              
                              tr:nth-child(even){background-color: #f2f2f2;}
                              
                              tr:hover {background-color: #ddd;}
                              
                              th {
                                padding-top: 12px;
                                padding-bottom: 12px;
                                text-align: left;
                                background-color: #1f2533;
                                color: white;
                              }
                            </style>
                            </head>";
                echo "<table>";
                echo "<tr>";
                echo "<th>OFFER ID</th>";
                echo "<th>COUPON CODE</th>";
                echo "<th>DISCOUNT PERCENTAGE</th>";
                echo "<th>MAX DISCOUNT</th>";
                echo "</tr>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                        echo "<td>" . $row['offer_id'] . "</td>";
                        echo "<td>" . $row['coupon_code'] . "</td>";
                        echo "<td>" . $row['discount_percentage'] . "</td>";
                        echo "<td>" . $row['max_discount'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>
                    </html>";
                
                mysqli_free_result($result);
            }
        }
    }
?>