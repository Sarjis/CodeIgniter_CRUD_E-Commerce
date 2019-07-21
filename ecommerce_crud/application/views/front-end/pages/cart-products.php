<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Item Image</td>
                    <td class="description">Name</td>
                    <td class="price">Price per Item</td>
                    <td class="quantity">Product Quantity</td>
                    <td class="total">Sub-total</td>

                    <td>Action</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php $sum = 0;
                    foreach ($this->cart->contents() as $item)  { ?>
                    <td class="cart_product">
                        <a href=""><img src="<?php echo base_url($item['options']['product_image']); ?>" alt=""
                                        height="50" width="50"></a>
                    </td>
                    <td class="cart_description">

                        <h4><a href=""><?php echo $item['name']; ?></a></h4>
                        <p>Web ID: <?php echo $item['id']; ?></p>
                    </td>
                    <td class="cart_price">
                        <p><?php echo $item['price']; ?></p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
                            <!--                            <a class="cart_quantity_up" href=""> + </a>-->
                            <form action="<?php echo base_url('cart/update') ?>" method="post">
                                <input type="number" name="product_quantity" value="<?php echo $item['qty']; ?>" min="1"
                                       size="2" required>
                                <input type="hidden" name="rowid" value="<?php echo $item['rowid']; ?>" >
                                <input type="submit" name="btn" value="Update" class="cart_quantity_down">
                            </form>
                            <!--                            <a class="cart_quantity_down" href=""> - </a>-->
                        </div>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">BDT. <?php echo $item['qty'] * $item['price'];
                            $sum = $sum + $item['qty'] * $item['price']; ?></p>
                    </td>

                    <td class="cart_delete">
                        <a class="cart_quantity_delete"
                           onclick="return confirm('Are you want to remove product from cart?')"
                           href="<?php echo base_url('cart/delete/') ?><?php echo $item["rowid"]; ?>"><i
                                    class="fa fa-times"></i></a>
                    </td>
                </tr>

                <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your
                delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default check_out pull-left" href="">Continue Shopping</a>
                    <a class="btn btn-default update" href="">Get Quotes</a>

                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>BDT. <?php echo $this->cart->total(); ?></span></li>
                        <li>VAT (5%) <span>BDT. <?php echo 0.05 * ($this->cart->total()); ?></span></li>
                        <li>Shipping Cost <span>BDT. 100</span></li>
                        <li>Total
                            <span>BDT. <?php echo 100 + $this->cart->total() + 0.05 * ($this->cart->total()); ?></span>
                        </li>
                    </ul>
<!--                    <a class="btn btn-default update" href="">Update</a>-->
                    <a class="btn btn-default check_out pull-right" href="<?php echo base_url('checkout')?>">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->