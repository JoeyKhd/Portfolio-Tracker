<?php
/* Template Name: Portfolio Tracker */
	get_header();
	?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css"
          integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
    <link rel="stylesheet" href="/cryptocoins/cryptocoins-colors.css">
    <link rel="stylesheet" href="/cryptocoins/cryptocoins.css">
<!--Price Formatter Library-->
    <script>

        (function (p, z) {
            function q(a) {
                return !!("" === a || a && a.charCodeAt && a.substr)
            }

            function m(a) {
                return u ? u(a) : "[object Array]" === v.call(a)
            }

            function r(a) {
                return "[object Object]" === v.call(a)
            }

            function s(a, b) {
                var d, a = a || {}, b = b || {};
                for (d in b)b.hasOwnProperty(d) && null == a[d] && (a[d] = b[d]);
                return a
            }

            function j(a, b, d) {
                var c = [], e, h;
                if (!a)return c;
                if (w && a.map === w)return a.map(b, d);
                for (e = 0, h = a.length; e < h; e++)c[e] = b.call(d, a[e], e, a);
                return c
            }

            function n(a, b) {
                a = Math.round(Math.abs(a));
                return isNaN(a) ? b : a
            }

            function x(a) {
                var b = c.settings.currency.format;
                "function" === typeof a && (a = a());
                return q(a) && a.match("%v") ? {
                    pos: a,
                    neg: a.replace("-", "").replace("%v", "-%v"),
                    zero: a
                } : !a || !a.pos || !a.pos.match("%v") ? !q(b) ? b : c.settings.currency.format = {
                    pos: b,
                    neg: b.replace("%v", "-%v"),
                    zero: b
                } : a
            }

            var c = {
                    version: "0.4.1",
                    settings: {
                        currency: {symbol: "$", format: "%s%v", decimal: ".", thousand: ",", precision: 2, grouping: 3},
                        number: {precision: 0, grouping: 3, thousand: ",", decimal: "."}
                    }
                }, w = Array.prototype.map, u = Array.isArray, v = Object.prototype.toString,
                o = c.unformat = c.parse = function (a, b) {
                    if (m(a))return j(a, function (a) {
                        return o(a, b)
                    });
                    a = a || 0;
                    if ("number" === typeof a)return a;
                    var b = b || ".", c = RegExp("[^0-9-" + b + "]", ["g"]),
                        c = parseFloat(("" + a).replace(/\((.*)\)/, "-$1").replace(c, "").replace(b, "."));
                    return !isNaN(c) ? c : 0
                }, y = c.toFixed = function (a, b) {
                    var b = n(b, c.settings.number.precision), d = Math.pow(10, b);
                    return (Math.round(c.unformat(a) * d) / d).toFixed(b)
                }, t = c.formatNumber = c.format = function (a, b, d, i) {
                    if (m(a))return j(a, function (a) {
                        return t(a, b, d, i)
                    });
                    var a = o(a), e = s(r(b) ? b : {precision: b, thousand: d, decimal: i}, c.settings.number),
                        h = n(e.precision), f = 0 > a ? "-" : "", g = parseInt(y(Math.abs(a || 0), h), 10) + "",
                        l = 3 < g.length ? g.length % 3 : 0;
                    return f + (l ? g.substr(0, l) + e.thousand : "") + g.substr(l).replace(/(\d{3})(?=\d)/g, "$1" + e.thousand) + (h ? e.decimal + y(Math.abs(a), h).split(".")[1] : "")
                }, A = c.formatMoney = function (a, b, d, i, e, h) {
                    if (m(a))return j(a, function (a) {
                        return A(a, b, d, i, e, h)
                    });
                    var a = o(a),
                        f = s(r(b) ? b : {
                            symbol: b,
                            precision: d,
                            thousand: i,
                            decimal: e,
                            format: h
                        }, c.settings.currency),
                        g = x(f.format);
                    return (0 < a ? g.pos : 0 > a ? g.neg : g.zero).replace("%s", f.symbol).replace("%v", t(Math.abs(a), n(f.precision), f.thousand, f.decimal))
                };
            c.formatColumn = function (a, b, d, i, e, h) {
                if (!a)return [];
                var f = s(r(b) ? b : {
                        symbol: b,
                        precision: d,
                        thousand: i,
                        decimal: e,
                        format: h
                    }, c.settings.currency),
                    g = x(f.format), l = g.pos.indexOf("%s") < g.pos.indexOf("%v") ? !0 : !1, k = 0,
                    a = j(a, function (a) {
                        if (m(a))return c.formatColumn(a, f);
                        a = o(a);
                        a = (0 < a ? g.pos : 0 > a ? g.neg : g.zero).replace("%s", f.symbol).replace("%v", t(Math.abs(a), n(f.precision), f.thousand, f.decimal));
                        if (a.length > k) k = a.length;
                        return a
                    });
                return j(a, function (a) {
                    return q(a) && a.length < k ? l ? a.replace(f.symbol, f.symbol + Array(k - a.length + 1).join(" ")) : Array(k - a.length + 1).join(" ") + a : a
                })
            };
            if ("undefined" !== typeof exports) {
                if ("undefined" !== typeof module && module.exports) exports = module.exports = c;
                exports.accounting = c
            } else"function" === typeof define && define.amd ? define([], function () {
                return c
            }) : (c.noConflict = function (a) {
                return function () {
                    p.accounting = a;
                    c.noConflict = z;
                    return c
                }
            }(p.accounting), p.accounting = c)
        })(this);
    </script>
    <div id="content" class="container content-area page-wrapper" role="main">
        <div class="row row-main">
            <div class="large-12 col">
                <div class="col-inner">
					<?php if ( get_theme_mod( 'default_title', 0 ) ) { ?>
                        <header class="entry-header">
                            <h1 class="entry-title mb uppercase"><?php the_title(); ?></h1>
                        </header><!-- .entry-header -->
					<?php } ?>
					<?php while ( have_posts() ) :
					the_post(); ?>
                    <style>
                        hr.divider-horizontal {
                            border-top: 1px solid black;
                        }

                        .btn-xs {
                            height: 100%;
                            font-size: .875rem;
                            line-height: .5;
                            border-radius: .2rem;
                            min-height: 0.1rem;
                        }

                        .table td, .table th {
                            vertical-align: middle;
                            border-top: 1px solid #dee2e6;
                        }

                        .col {
                            position: relative;
                            margin: 0;
                            padding: 0 15px 30px !important;
                            width: 100%;
                        }
                        .table td, .table th {
                            vertical-align: middle;
                            border-top: 1px solid #dee2e6;
                            text-align: center;
                        }
                    </style>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
								<?php echo 'Welcome back, ' . $current_user->first_name . '! <br>'; ?>
                            </div>
                            <div class="col-md-6">
                                <div class="cmc-connection"><i class="fa fa-refresh fa-spin fa-fw"
                                                               aria-hidden="true"></i>
                                    Connecting...
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="divider-horizontal">
					<?php

                        $existsquery = "SELECT * FROM wp_portfolio";
                        $exists = $wpdb->get_results( $existsquery, OBJECT );

                        if (!$exists){
                            $createPortfolioquery = "CREATE TABLE wp_portfolio(
                                                        user_id int null,
                                                        coin varchar(255) null,
                                                        buyprice int null,
                                                        qty decimal(10,2) null,
                                                        timestamp timestamp default CURRENT_TIMESTAMP not null,
                                                        list_id int not null auto_increment
                                                        primary key,
                                                        constraint wp_portfolio_list_id_uindex
                                                        unique (list_id)
                                                        )";

                            $createPortfolioHistory = "create table wp_portfolio_history
                                                        (
                                                        user_id int null,
                                                        coin varchar(255) null,
                                                        buyprice decimal(10,2) null,
                                                        closedprice decimal(10,2) null,
                                                        profitatclosed decimal(20,2) null,
                                                        qty decimal(10,2) null,
                                                        timestamp_started varchar(255) null,
                                                        timestamp timestamp default CURRENT_TIMESTAMP not null,
                                                        list_id int not null auto_increment
                                                        primary key,
                                                        totalvalue_closed decimal(20,2) null,
                                                        constraint wp_portfolio_history_list_id_uindex
                                                        unique (list_id)
                                                        )";


                            $createPortfolioquery_push = $wpdb->get_results( $createPortfolioquery, OBJECT );
                            $createPortfolioHistory_push = $wpdb->get_results( $createPortfolioHistory, OBJECT );
                            
                        }

					//                        Gets all users data
					$user_id = $current_user->id;
					$querystr = "SELECT * FROM wp_portfolio WHERE user_id = '$user_id';";
					$portfolio_data = $wpdb->get_results( $querystr, OBJECT );

					if ( isset( $_POST ['submit'] ) ) {
						$user_id  = $current_user->id;
						$coin     = $_POST['coin'];
						$buyprice = $_POST['buyprice'];
						$qty      = $_POST['qty'];
						$wpdb->insert( 'wp_portfolio', array(
							'user_id'  => $user_id,
							'coin'     => $coin,
							'buyprice' => $buyprice,
							'qty'      => $qty
						) );
					}
					//						When you press the delete button in the Open Orders table
					if ( isset( $_POST ['delete_history'] ) ) {
						$id       = $_POST['list_id'];
						$user_id  = $current_user->id;
						$coin     = $_POST['coin'];
						$buyprice = $_POST['buyprice'];
						$qty      = $_POST['qty'];
						echo $id;
						$wpdb->query( 'DELETE FROM wp_portfolio_history WHERE list_id=' . $id );
					}
					if ( isset( $_POST ['delete'] ) ) {
						$id      = $_POST['list_id'];
						$user_id = $current_user->id;
						$coin_name_delete = 'coinname' . $id;
						$coin    = $_POST[ $coin_name_delete ];
						$list_id_delete_buy_price = 'buyprice' . $id;
						$buyprice = $_POST[ $list_id_delete_buy_price ];
						$total_value_delete = 'totalvalue-count' . $id;
						$totalvalue = $_POST[$total_value_delete];
						$qty_delete = 'coinqty' . $id;
						$qty = $_POST[$qty_delete];
						$timestamp_delete = 'timestamp' . $id;
						$timestamp = $_POST[$timestamp_delete];
						$profitloss_delete = 'profitloss-count2' . $id;
						$profitloss = $_POST[$profitloss_delete];
						$pricewhenclosed_delete = 'cprice' . $id;
						$pricewhenclosed = $_POST[$pricewhenclosed_delete];
						$totalvalue_closed = 'totalvalue-count' . $id;
						$totalvalueclosed = $_POST[$totalvalue_closed];
						$wpdb->insert( 'wp_portfolio_history', array(
							'user_id'  => $user_id,
							'coin'     => $coin,
							'buyprice' => $buyprice,
							'closedprice' => $pricewhenclosed,
							'profitatclosed' => $profitloss,
							'timestamp_started' => $timestamp,
							'totalvalue_closed' => $totalvalueclosed,
							'qty'      => $qty
						) );
						$wpdb->query( 'DELETE FROM wp_portfolio WHERE list_id=' . $id );
					}
					?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <h3>Total value: <i class="totalPortfolio">-</i></h3>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="padding-left: 0px;">
                                        <i class="cc BTC-alt"></i> <i class="valueinbtc">-</i>
                                    </div>
                                    <div class="col-md-6">
                                        <i class="cc ETH-alt"></i> <i class="valueineth">-</i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"><h3>Total Profit/Loss: <i class="totalProfitLoss">-</i></h3>
                            </div>
                        </div>
                    </div>
                    <hr class="divider-horizontal">
                    <form action="" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="inputState">Coin</label>
                                <select class="form-control selector" id="inputState" name="coin">
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="currentPrice">Current price</label>
                                <input type="text" class="currentPrice form-control" disabled id="currentPrice">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="boughtOn">Bought on</label>
                                <input type="text" class="form-control" name="buyprice" id="boughtOn">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="Qty">Qty</label>
                                <input type="text" class="form-control" name="qty" id="qty">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputZip">______</label>
                                <button type="submit" name="submit"
                                        class="form-control btn btn-success btn-outline " name="addcoin">Add
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="coinpricerBTC" style="display:none;"></div>
                    <div class="coinpricerETH" style="display:none;"></div>
                    <hr class="divider-horizontal">
                    <h3>Open Trades:</h3>
                    <!--                        OPEN TRADES STARTS HERE-->
                    <form action="" method="post">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th scope="col" style="text-align:center;">Symbol</th>
                                <th scope="col">Coin</th>
                                <th scope="col">Current price</th>
                                <th scope="col">Bought on</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Profit/Loss</th>
                                <th scope="col">Total value</th>
                                <th scope="col">Added on</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
							<?php
							$user_id = $current_user->id;
							$querystr = "SELECT * FROM wp_portfolio WHERE user_id = '$user_id';";
							$arr = $wpdb->get_results( $querystr, ARRAY_A );
							$length = count( $arr );
							for ( $i = 0;
							$i < $length;
							$i ++ ) {
							echo '<tr>';
							echo '<form method="post">';
							echo '<td style="font-size:16px; text-align:center;"><i class="cc ' . strtoupper( $arr[ $i ][ coin ] ) . '"></i></td>';
							echo '<td style="font-weight:bold;">' . strtoupper( $arr[ $i ][ coin ] ) . '</td>';
							echo '<input class="coinname" name="coinname' . $arr[ $i ][ list_id ] . '" value="' . strtoupper( $arr[ $i ][ coin ] ) . '" style="display:none;"/>';
							echo '<td class="cprice' . $i . ' coinprice' . strtoupper( $arr[ $i ][ coin ] ) . '"></td>';
							echo '<input class="coinprice' . strtoupper( $arr[ $i ][ coin ] ) . '" name="cprice' . $arr[ $i ][ list_id ] . '" id="coinprice' . strtoupper( $arr[ $i ][ coin ] ) . '" value="" style="display:none;"/>';
								echo '<td class="buyprice' . $i . ' " name="buyprice' . $arr[ $i ][ list_id ] . '">' . $arr[ $i ][ buyprice ] . '</td>';
								echo '<input class="buyprice' . $i . '" name="buyprice' . $arr[ $i ][ list_id ] . '" value="' . $arr[ $i ][ buyprice ] . '"style="display:none;"/>';
								echo '<td class="coinqty' . $i . '">' . $arr[ $i ][ qty ] . '</td>';
								echo '<input class="coinqty' . $i . '" name="coinqty' . $arr[ $i ][ list_id ] . '" value="' . $arr[ $i ][ qty ] .  '" style="display:none;"/>';
								echo '<td class="profitloss-count" id="profitloss' . $i . '">-</td>';
								echo '<input class="profitloss-count' . $i . '" name="profitloss-count2' . $arr[ $i ][ list_id ] . '" value="1" id="profitloss2' . $i . '"style="display:none;"/>';
								echo '<td class="totalvalue-count" id="totalvalue' . $i . '"></td>';
								echo '<input class="totalvalue-count' . $i . '" name="totalvalue-count' . $arr[ $i ][ list_id ] . '" value="1" id="totalvalue2' . $i . '"style="display:none;"/>';
								echo '<td > ' . $arr[ $i ][ timestamp ] . '</td > ';
								echo '<input class="time' . $i . '" name = "timestamp' . $arr[ $i ][ list_id ] . '" value = "'.$arr[ $i ][ timestamp ] . '"style="display:none;" />';
								echo '<td ><input type = "hidden" value = "' . $arr[ $i ][ list_id ] . '" name = "list_id" ><button type = "submit" name = "delete" class="btn btn-danger btn-xs" ><i class="fa fa-trash-o" aria-hidden="true" ></i >
</button >
</td > ';
								echo '</tr > ';
								echo '</form > ';
							}
							?>
                            </tbody>
                        </table>
                </form>
                        <h3>Trade History:</h3>
<!--                        TRADE HISTORY STARTS HERE-->
                        <table class="table table-sm">
                            <thead>
                            <tr style="text-align:center;">
                                <th scope="col" style="text-align:center;">Symbol</th>
                                <th scope="col">Coin</th>
                                <th scope="col">Current price</th>
                                <th scope="col">Price when closed</th>
                                <th scope="col">Bought on</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Profit/Loss [Closed]</th>
                                <th scope="col">Total value [Closed]</th>
                                <th scope="col">Trade Opened</th>
                                <th scope="col">Trade Closed</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
							<?php
							$user_id = $current_user->id;
							$querystr = "SELECT * FROM wp_portfolio_history WHERE user_id = '$user_id';";
							$arr = $wpdb->get_results( $querystr, ARRAY_A );
							$length = count( $arr );
							for ( $i = 0; $i < $length; $i ++ ) {
								echo '<tr>';
								echo '<td style="font-size:16px; text-align:center;" ><i class="cc ' . strtoupper( $arr[ $i ][ coin ] ) . '" ></i ></td > ';
								echo '<td style = "font-weight:bold;" > ' . strtoupper( $arr[ $i ][ coin ] ) . '</td > ';
								echo '<td class="cprice2' . $i . ' coinprice' . strtoupper( $arr[ $i ][ coin ] ) . '" ></td > ';
								echo '<td class="closedprice2' . $i . '" > ' . $arr[ $i ][ closedprice ] . '</td > ';
								echo '<td >'. $arr[ $i ][ buyprice ] . '</td > ';
								echo '<td class="coinqty2' . $i . '" > ' . $arr[ $i ][ qty ] . '</td > ';
								echo '<td > ' . $arr[ $i ][ profitatclosed ] . '</td > ';
								echo '<td >' . $arr[ $i ][ totalvalue_closed ] . '</td > ';
								echo '<td > ' . $arr[ $i ][ timestamp_started ] . '</td > ';
								echo '<td > ' . $arr[ $i ][ timestamp ] . '</td > ';

								echo '<td ><form action="" method = "post" ><input type = "hidden" value = "' . $arr[ $i ][ list_id ] . '" name = "list_id" ><button type = "submit" name = "delete_history" class="btn btn-danger btn-xs" ><i class="fa fa-trash-o" aria-hidden="true" ></i >
</button></form>
</td>';
								echo '</tr>';
							}
							?>
                                                        </tbody>
                                                    </table>
							<?php if ( comments_open() || '0' != get_comments_number() ) {
								comments_template();
							} ?>
							<?php do_action( 'flatsome_after_page_content' ); ?>
							<?php endwhile; // end of the loop. ?>
                </div><!-- .col-inner -->
            </div><!-- .large-12 -->
        </div><!-- .row -->
    </div>
    <script>
        jQuery(document).ready(function () {
            var ready = false;
            jQuery.ajax({
                url: 'https://api.coinmarketcap.com/v1/ticker/?convert=EUR&limit=25',
                data: {},
                success: function (data) {
                    jQuery.each(data, function (index, item) {
                        jQuery('.selector').append('<option>' + item.symbol + '</option>'); //Appends all options for the coins
                        jQuery('.coinprice' + item.symbol).html(item.price_usd);
                        jQuery('#coinprice' + item.symbol).attr('value' , item.price_usd);
                        jQuery('.coinpricer' + item.symbol).html(item.price_usd);
                        jQuery('.coinpricer' + item.symbol).html(item.price_usd);
                        loadCurrentPrice(item);
                        var cprice = jQuery('.cprice0').value;
                        if (cprice != '') {
                        }
                    });
                    jQuery('.cmc-connection').html('<i class="fa fa-check-square" aria-hidden="true" style="color:green;"></i> Connected');
                    sumTotals();
                    formatEverything();
                },
            });
            function loadCurrentPrice(item) {
                jQuery(".selector").change(function () {
                    var id = jQuery(this).find("option:selected").text();
                    jQuery.each(item, function () {
                        if (item.symbol == id) {
                            var coinPriceFormatted = item.price_usd;
                            coinPriceFormatted = accounting.formatMoney(coinPriceFormatted);
                            jQuery('.currentPrice').val(coinPriceFormatted);
                        }
                    });
                });
            }
            function sumTotals() {
                var columnsLength = jQuery('table tr').length - 1;
                for (var i = 0; i < columnsLength; i++) {
                    var cprice = jQuery('.cprice' + i).text();
                    var coinqty = jQuery('.coinqty' + i).text();
                    var buyprice = jQuery('.buyprice' + i).text();
                    var totalsum = cprice * coinqty;
                    var profitLossOne = buyprice * coinqty;
                    var profitLossFinal = totalsum - profitLossOne;
                    jQuery('#totalvalue' + i).html(totalsum);
                    jQuery('#totalvalue2' + i).attr('value' , totalsum);
                    jQuery('#profitloss' + i).html(profitLossFinal);
                    jQuery('#profitloss2' + i).attr('value' , profitLossFinal);
                }
                countTotalLoss();
            }
            function countTotalLoss() {
                var profitlosssum = 0;
                var totalvaluesum = 0;
                jQuery('.profitloss-count').each(function () {
                    profitlosssum += Number(jQuery(this).text());
                    return profitlosssum;
                });
                jQuery('.totalvalue-count').each(function () {
                    totalvaluesum += Number(jQuery(this).text());
                    return totalvaluesum;
                });
                var ethprice = jQuery('.coinpricerETH').text();
                var btcprice = jQuery('.coinpricerBTC').text();
                var valueineth = totalvaluesum / ethprice;
                var valueinbtc = totalvaluesum / btcprice;
                jQuery('.valueineth').html(valueineth.toFixed(2));
                jQuery('.valueinbtc').html(valueinbtc.toFixed(2));
                jQuery('.totalPortfolio').html(totalvaluesum);
                jQuery('.totalProfitLoss').html(profitlosssum);
            }
        });
        function formatEverything() {
            var columnsLength = jQuery('table tr').length - 1;
            for (var i = 0; i < columnsLength; i++) {
                var cprice = jQuery('.cprice' + i).text();
                var buyprice = jQuery('.buyprice' + i).text();
                var totalvaluesumformat = jQuery('.totalPortfolio').text();
                var totalProfitLossformat = jQuery('.totalProfitLoss').text();
                var totalvaluecolumnFormat = jQuery('#totalvalue' + i).text();
                var profitlosscolumnFormat = jQuery('#profitloss' + i).text();
                var coinPriceFormatted = cprice;
                coinPriceFormatted = accounting.formatMoney(coinPriceFormatted);
                var buyPriceFormatted = buyprice;
                buyPriceFormatted = accounting.formatMoney(buyPriceFormatted);
                var totalvaluesumFormatted = totalvaluesumformat;
                totalvaluesumFormatted = accounting.formatMoney(totalvaluesumFormatted);
                var totalProfitLossFormatted = totalProfitLossformat;
                totalProfitLossFormatted = accounting.formatMoney(totalProfitLossFormatted);
                var totalvaluecolumnFormatted = totalvaluecolumnFormat;
                totalvaluecolumnFormatted = accounting.formatMoney(totalvaluecolumnFormatted);
                var profitlosscolumnFormatted = profitlosscolumnFormat;
                profitlosscolumnFormatted = accounting.formatMoney(profitlosscolumnFormatted);
                jQuery('.totalPortfolio').html(totalvaluesumFormatted);
                jQuery('.totalProfitLoss').html(totalProfitLossFormatted);
                jQuery('#totalvalue' + i).html(totalvaluecolumnFormatted);
                jQuery('#profitloss' + i).html(profitlosscolumnFormatted);
                jQuery('.cprice' + i).html(coinPriceFormatted);
                jQuery('.buyprice' + i).html(buyPriceFormatted);
            }
        }

    </script>

	<?php
	get_footer();
?>



