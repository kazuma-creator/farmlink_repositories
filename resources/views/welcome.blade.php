<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FARMLINK</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <header class="header">
            <div class="header-inner">
                <a class="header-logo" href="{{route('welcome')}}">FARMLINK</a>
                <nav class="header-site-menu">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('data') }}" class="login-link">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="login-link">ログイン</a>
                        @endauth
                    @endif
                </nav>
    
            </div>
        </header>
        <main class="main">
            <div class="first-view">
                <div class="first-view-text">
                    <h1>FARMLINK</h1>
                    <p>～食卓にもっと安全を、そして絆を～</p>
                </div>
            </div>
            <div class="lead">
                <p>
                    FARMLINKは、生産者と消費者を繋ぐ架け橋です。<br>
                    あなたの野菜と声をたくさんの人に届けましょう。
                </p>
                <div class="link-button-area">
                    <a class="link-button-text" href="{{route('register')}}">はじめる</a>
                </div>
            </div>
            <div class="recommended">
                <h2>豊富な機能</h2>
                <div class="wrap">
                    <ul class="item-list">
                        <li>
                            <img src="{{asset('../images/QRコードアイコン.png')}}" alt="">
                            <dl>
                                <dt>農作物ページ公開</dt>
                                <dd>オリジナルのQRコードを作成し、ページを公開することができます。</dd>
                            </dl>
                        </li>
                        <li>
                            <img src="{{asset('../images/資材アイコン.png')}}" alt="">
                            <dl>
                                <dt>資材管理</dt>
                                <dd>農作物の生産に必要な資材を管理できます。</dd>
                            </dl>
                        </li>
                        <li>
                            <img src="{{asset('../images/グラフアイコン.png')}}" alt="">
                            <dl>
                                <dt>ダッシュボード</dt>
                                <dd>様々なデータをグラフで視覚化できます。</dd>
                            </dl>
                        </li>
                        <li>
                            <img src="{{asset('../images/収穫アイコン.png')}}" alt="">
                            <dl>
                                <dt>収穫・出荷記録</dt>
                                <dd>収穫や出荷の記録をして保存することができます。</dd>
                            </dl>
                        </li>
                        <li>
                            <img src="{{asset('../images/農薬アイコン.png')}}" alt="">
                            <dl>
                                <dt>農薬・肥料記録</dt>
                                <dd>農薬や肥料の使用履歴を登録できます。</dd>
                            </dl>
                        </li>
                        <li>
                            <img src="{{asset('../images/日報アイコン.png')}}" alt="">
                            <dl>
                                <dt>従業員日報</dt>
                                <dd>その日行った作業や作業時間などを管理できます。</dd>
                            </dl>
                        </li>
                        <li>
                            <img src="{{asset('../images/圃場アイコン.png')}}" alt="">
                            <dl>
                                <dt>圃場登録</dt>
                                <dd>使用している圃場の情報を登録できます。</dd>
                            </dl>
                        </li>
                        <li>
                            <img src="{{asset('../images/作業員アイコン.png')}}" alt="">
                            <dl>
                                <dt>作業員登録</dt>
                                <dd>農場の作業員を登録することができます。</dd>
                            </dl>
                        </li>
                        <li>
                            <img src="{{asset('../images/取引先アイコン.png')}}" alt="">
                            <dl>
                                <dt>取引先登録</dt>
                                <dd>商品の出荷先を登録できます。</dd>
                            </dl>
                        </li>
                        <li>
                            <img src="{{asset('../images/品目アイコン.png')}}" alt="">
                            <dl>
                                <dt>品目登録</dt>
                                <dd>栽培する品目を登録できます。</dd>
                            </dl>
                        </li>
                        <li>
                            <img src="{{asset('../images/作業アイコン.png')}}" alt="">
                            <dl>
                                <dt>作業登録</dt>
                                <dd>基本的な作業を登録できます。</dd>
                            </dl>
                        </li>
                        <li>
                            <img src="{{asset('../images/機械設備アイコン.png')}}" alt="">
                            <dl>
                                <dt>機械設備登録</dt>
                                <dd>使用している機械設備の情報を登録できます。</dd>
                            </dl>
                        </li>
                        <li>
                            <img src="{{asset('../images/商品アイコン.png')}}" alt="">
                            <dl>
                                <dt>商品登録</dt>
                                <dd>出荷する商品を登録できます。</dd>
                            </dl>
                        </li>
                        <li>
                            <img src="{{asset('../images/種苗アイコン.png')}}" alt="">
                            <dl>
                                <dt>作付記録</dt>
                                <dd>作付けした作物などの情報を登録できます。</dd>
                            </dl>
                        </li>
                    </ul>
                    <ul class="item-list">
                        <li>
                            <img src="{{asset('../images/QRコードアイコン.png')}}" alt="">
                            <dl>
                                <dt>農作物ページ公開</dt>
                                <dd>オリジナルのQRコードを作成し、ページを公開することができます。</dd>
                            </dl>
                        </li>
                        <li>
                            <img src="{{asset('../images/資材アイコン.png')}}" alt="">
                            <dl>
                                <dt>資材管理</dt>
                                <dd>農作物の生産に必要な資材を管理できます。</dd>
                            </dl>
                        </li>
                        <li>
                            <img src="{{asset('../images/グラフアイコン.png')}}" alt="">
                            <dl>
                                <dt>ダッシュボード</dt>
                                <dd>様々なデータをグラフで視覚化できます。</dd>
                            </dl>
                        </li>
                        <li>
                            <img src="{{asset('../images/収穫アイコン.png')}}" alt="">
                            <dl>
                                <dt>収穫・出荷記録</dt>
                                <dd>収穫や出荷の記録をして保存することができます。</dd>
                            </dl>
                        </li>
                        <li>
                            <img src="{{asset('../images/農薬アイコン.png')}}" alt="">
                            <dl>
                                <dt>農薬・肥料記録</dt>
                                <dd>農薬や肥料の使用履歴を登録できます。</dd>
                            </dl>
                        </li>
                        <li>
                            <img src="{{asset('../images/日報アイコン.png')}}" alt="">
                            <dl>
                                <dt>従業員日報</dt>
                                <dd>その日行った作業や作業時間などを管理できます。</dd>
                            </dl>
                        </li>
                        <li>
                            <img src="{{asset('../images/圃場アイコン.png')}}" alt="">
                            <dl>
                                <dt>圃場登録</dt>
                                <dd>使用している圃場の情報を登録できます。</dd>
                            </dl>
                        </li>
                        <li>
                            <img src="{{asset('../images/作業員アイコン.png')}}" alt="">
                            <dl>
                                <dt>作業員登録</dt>
                                <dd>農場の作業員を登録することができます。</dd>
                            </dl>
                        </li>
                        <li>
                            <img src="{{asset('../images/取引先アイコン.png')}}" alt="">
                            <dl>
                                <dt>取引先登録</dt>
                                <dd>商品の出荷先を登録できます。</dd>
                            </dl>
                        </li>
                        <li>
                            <img src="{{asset('../images/品目アイコン.png')}}" alt="">
                            <dl>
                                <dt>品目登録</dt>
                                <dd>栽培する品目を登録できます。</dd>
                            </dl>
                        </li>
                        <li>
                            <img src="{{asset('../images/作業アイコン.png')}}" alt="">
                            <dl>
                                <dt>作業登録</dt>
                                <dd>基本的な作業を登録できます。</dd>
                            </dl>
                        </li>
                        <li>
                            <img src="{{asset('../images/機械設備アイコン.png')}}" alt="">
                            <dl>
                                <dt>機械設備登録</dt>
                                <dd>使用している機械設備の情報を登録できます。</dd>
                            </dl>
                        </li>
                        <li>
                            <img src="{{asset('../images/商品アイコン.png')}}" alt="">
                            <dl>
                                <dt>商品登録</dt>
                                <dd>出荷する商品を登録できます。</dd>
                            </dl>
                        </li>
                        <li>
                            <img src="{{asset('../images/種苗アイコン.png')}}" alt="">
                            <dl>
                                <dt>作付記録</dt>
                                <dd>作付けした作物などの情報を登録できます。</dd>
                            </dl>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
        <footer class="footer">
            <p class="footer-tel">TEL 090-9454-2291</p>
            <p class="copyrigth">© 2025 べにくじゃく</p>
        </footer>
    </div>
</body>
</html>
