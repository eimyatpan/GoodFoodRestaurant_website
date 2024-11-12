<div>
        <table  cellpadding=10 class="table table-bordered table-striped">
                        <thead>
                            <th style="text-align:center">Product Name</th>
                            <th style="text-align:center">Product Price</th>
                            <th style="text-align:center">Purchase Quantity</th>
                            <th style="text-align:center">Subtotal</th>
                            <th style="text-align:center">Total Price</th>
                        </thead>
                        <tbody>
                            <?php                            
                                $sql="select * from foodorder_details left join product on product.productid=foodorder_details.productid where orderid='".$row['orderid']."'";
                                $dquery=$conn->query($sql);
                                while($drow=$dquery->fetch_array()){
                                    ?>
                                    <tr>
                                        <td style="text-align:center"><?php echo $drow['productname']; ?></td>
                                        <td style="text-align:right">&#36; <?php echo number_format($drow['price'], 2); ?></td>
                                        <td style="text-align:center"><?php echo $drow['quantity']; ?></td>
                                        <td style="text-align:right">&#36;
                                            <?php
                                                $subt = $drow['price']*$drow['quantity'];
                                                echo number_format($subt, 2);
                                            ?>
                                        </td>
                                    
                                    <?php
                                    
                                }
                            ?>
                                <td style="text-align:right">&#36; <?php echo number_format($row['totalprice'], 2); ?></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            
            
