<?php get_header(); ?>

<main>

  <div class="bg-wrapper">
    <!-- MV -->
    <section class="mv">
      <div class="mv__inner">
        <div class="mv__container">
          <h2 class="mv__catch">
            <img src="<?php img_path('catchcopy.svg'); ?>" alt="道をつなぎ、想いをつなぎ、未来をつなぐ。" width="270" height="132">
          </h2>
          <figure class="mv__img">
            <img src="<?php img_path('mv.webp'); ?>" alt="快晴の空と海と船" width="1350" height="776">
          </figure>
        </div>
      </div>
      <div class="mv__scroll">
        <p class="mv__scroll-text">
          scroll
        </p>
      </div>
    </section>

    <section id="message" class="message layout-message">
      <div class="message__inner inner">
        <div class="message__container">
          <h2 class="message__title">
            Message
          </h2>
          <p class="message__text">
            ケミカル専門の内航海上輸送を業とし、<br class="sp-only">有力荷主並びに<br class="pc-only">
            運航会社様のご愛顧により、<br class="sp-only">海上における<br class="pc-only">安全・健康・地球環境保護に<br class="sp-only">積極的に取り組んで参りました。<br>
            特に、有機薬品の海上輸送が<br class="sp-only">小口で輸送される関係上、<br>
            これら小型船の分野での地位を<br class="sp-only">確立してまいりました。
          </p>
        </div>
      </div>
    </section>

    <section id="service" class="service layout-service">
      <div class="service__accent">
        <div class="en-accent" aria-hidden="true">Service</div>
      </div>
      <div class="service__inner inner">
        <div class="service__container">
          <div class="service__title">
            <div class="section-title">
              <figure class="section-title__en" style="--_width-sp: 148; --_width-pc: 246;">
                <img src="<?php img_path('title-service.svg'); ?>" alt="Service" width="148" height="32" loading="lazy">
              </figure>
              <h2 class="section-title__ja">サービス一覧</h2>
            </div>
          </div>
          <p class="service__text">会社案内のテキストが入ります。三光<span class="upper">（sankou）</span>はあなたの運送会社です。専用ネットワークを活かし、あらゆる規模の配送を迅速かつ確実に対応します。お客様のスケジュールに合わせた柔軟な配送プランをご提案します。会社案内のテキストが入ります。</p>

          <?php
          $serviceItem = [
            [
              'title' => '一般貨物運送<br>（全国へ対応）',
              'text' => '01のテキストが入ります。一般貨物運送業を中心に、全国の運送・配送作業対応しております。当社ならではのネットワークを活かし、運送に付帯する業務も全国対応致します。近距離、中距離、長距離、貸切輸送、積合せ輸送等、幅広いお客様のニーズにお応えし、確実・安全な輸送および物流プランをご提供いたします。',
              'modifier' => 'card__title--small'
            ],
            [
              'title' => '様々な貨物に<br class="sp-only">大口まで対応',
              'text' => '02のテキストが入ります。現場から現場への運搬、鉄骨、プレカット材、コンクリートなどの建設資材、建具などの内装部材やユニットバス部材などの住宅資材等のお荷物を松山市を拠点として配送致します。愛媛県外のオフィスの移転作業(引越し)等もお任せ下さい。弊社で所有している車両に対応するお荷物であれば可能な限り対応いたします。',
              'modifier' => 'card__title--small'
            ],
            [
              'title' => '安心安全への取組み',
              'text' => '03のテキストが入ります。提供しているのは安心安全、スピーディーかつ礼節のある物流サービスです。出発・終了点呼、ドライバーの体調や飲酒の有無はもちろん、関わる皆様へのマナーや身だしなみの確認・測定を行なっております。',
            ]
          ]; ?>

          <ul class="service__list">
            <?php foreach ($serviceItem as $item) : ?>
              <li class="service__item">
                <div class="card">
                  <h3 class="card__title<?php if (isset($item['modifier'])) echo ' ' . $item['modifier']; ?>">
                    <span><?php echo wp_kses_post($item['title']); ?></span>
                  </h3>
                  <p class="card__text">
                    <?php echo wp_kses_post($item['text']); ?>
                  </p>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </section>

    <!-- 会社概要 -->
    <section id="company" class="company layout-company">
      <div class="company__wrapper">
        <div class="company__accent">
          <div class="en-accent" aria-hidden="true">Company</div>
        </div>
        <div class="company__inner inner">
          <div class="company__overview">
            <div class="company__overview-title">
              <div class="section-title section-title--descender">
                <div class="section-title__en" style="--_width-sp: 186; --_width-pc: 325;">
                  <img src="<?php img_path('title-company.svg'); ?>" alt="Company" width="186" height="40" loading="lazy">
                </div>
                <h2 class="section-title__ja section-title__ja--descender">会社概要</h2>
              </div>
            </div>
            <?php
            $overviewItem = [
              [
                'term' => '商号',
                'desc' => '三光運輸株式会社',
              ],
              [
                'term' => '所在地',
                'desc' => '〒791-8013 愛媛県松山市山越1丁目8番10号<br class="sp-only"><a href="https://maps.app.goo.gl/36WzBohMQD5giYo38" target="_blank" rel="noreferrer">GoogleMapで見る</a><br>Tel. 089-925-1014<br>Fax. 089-926-0888',
              ],
              [
                'term' => '代表取締役社長',
                'desc' => '清水 修',
              ],
              [
                'term' => '設立',
                'desc' => '1973年5月23日',
              ],
              [
                'term' => '資本金',
                'desc' => '27,600千円',
              ],
              [
                'term' => '従業員数',
                'desc' => '海上勤務 33名　陸上勤務 3名',
              ],
              [
                'term' => '事業内容',
                'desc' => '海運業',
              ],
              [
                'term' => '主要取引先',
                'desc' => 'JFE物流株式会社／三洋海運株式会社',
              ],
              [
                'term' => '取引金融機関',
                'desc' => '日本政策金融金庫 松山支店<br>伊予銀行 本町支店<br>阿波銀行 松山支店',
              ],
              [
                'term' => '所属海運組合',
                'desc' => '全国内航タンカー海運組合<br>全日本内航船主海運組合<br>中予地区海運組合',
              ]
            ];
            ?>
            <dl class="company__overview-list">
              <?php foreach ($overviewItem as $item) : ?>
                <div class="company__overview-wrap">
                  <dt class="company__overview-term">
                    <?php echo wp_kses_post($item['term']); ?>
                  </dt>
                  <dd class="company__overview-desc">
                    <?php echo wp_kses_post($item['desc']); ?>
                  </dd>
                </div>
              <?php endforeach; ?>
            </dl>
          </div>
          <!-- 沿革 -->
          <div class="company__history">
            <h3 class="company__history-head">沿革</h3>

            <?php
            $historyItem = [
              [
                'year' => '1954',
                'events' => [
                  [
                    'month' => '',
                    'event' => '“竹嶋丸”150屯積購入独立自営、船主船長として経営に参加',
                  ],
                ],
              ],
              [
                'year' => '1960',
                'events' => [
                  [
                    'month' => '',
                    'event' => '“第五恭海丸”450屯積を購入、宇和島運輸株式会社の雑貨定期船を運航',
                  ]
                ]
              ],
              [
                'year' => '1965',
                'events' => [
                  [
                    'month' => '',
                    'event' => '“第八恭海丸”550屯積を新造、東洋港運株式会社の定期傭船となり、黒油を運搬',
                  ]
                ]
              ],
              [
                'year' => '1967',
                'events' => [
                  [
                    'month' => '',
                    'event' => '第五恭海丸にステンレスタンクを搭載、第一タンカー株式会社の定期傭船となり、<span class="text-block">ケミカル輸送に着手</span>',
                  ]
                ]
              ],
              [
                'year' => '1973',
                'events' => [
                  [
                    'month' => '5月',
                    'event' => '三光タンカー株式会社を設立<br>資本金600万円<br>清水錬太郎、代表取締役に就任',
                  ],
                  [
                    'month' => '11月',
                    'event' => 'ケミカルタンカー”三光丸”800屯積TYP IIを建造、第一タンカー株式会社に定期傭船<br>倍額増資、資本金1,200万円<br>300万円増資、資本金1,500万円',
                  ],
                ]
              ],
              [
                'year' => '1976',
                'events' => [
                  [
                    'month' => '10月',
                    'event' => '高知重工にてケミカルタンカー”三峯丸”1,260屯積を建造、第一タンカー株式会社に定期傭船<br>同月、100万円増資、資本金1,600万円<br>第五恭海丸を売船<br>第八恭海丸は三峯丸の代替船として解散。同時に第八恭海丸を代替船として、コールタール船<br>“泰成丸”を購入',
                  ]
                ]
              ],
              [
                'year' => '1980',
                'events' => [
                  [
                    'month' => '10月',
                    'event' => '泰成丸を光洋汽船株式会社に定期傭船',
                  ]
                ]
              ],
              [
                'year' => '1984',
                'events' => [
                  [
                    'month' => '5月',
                    'event' => '黒油”大晃丸”1,430屯積を購入、光洋汽船株式会社に定期傭船',
                  ]
                ]
              ],
              [
                'year' => '1986',
                'events' => [
                  [
                    'month' => '7月',
                    'event' => '花王株式会社の洗剤専航船として、800屯積SUS304TYP IIケミカルタンカー”海王”を建造、<br class="pc-only">近畿タンカー株式会社に定期傭船',
                  ]
                ]
              ],
              [
                'year' => '1987',
                'events' => [
                  [
                    'month' => '3月',
                    'event' => '大晃丸を光洋汽船株式会社の要請により、同社に売却',
                  ]
                ]
              ],
              [
                'year' => '1988',
                'events' => [
                  [
                    'month' => '11月',
                    'event' => '1,000屯積SUS304TYP IIケミカルタンカー”第二海王”を建造、近海タンカー株式会社に定期<br class="pc-only">傭船。花王株式会社の洗剤原料を前記海王と二隻態勢で運航する',
                  ]
                ]
              ],
              [
                'year' => '1990',
                'events' => [
                  [
                    'month' => '10月',
                    'event' => '株式会社上島造船にて、コールタール専航船500屯積TYP II”日英丸”を建造、日産船舶株式<br class="pc-only">会社（現JFE物流）に定期傭船<br>泰成丸は、日英丸の代替船として解撤',
                  ]
                ]
              ],
              [
                'year' => '1991',
                'events' => [
                  [
                    'month' => '4月',
                    'event' => '清水修、専務取締役に就任',
                  ],
                  [
                    'month' => '11月',
                    'event' => '下ノ江造船株式会社にて、1,250屯積SUS304TYP IIケミカルタンカー”三光丸”を建造、第一<br class="pc-only">タンカー株式会社に定期傭船<br>旧三光丸は、新三光丸の代替船として解撤',
                  ]
                ]
              ],
              [
                'year' => '1992',
                'events' => [
                  [
                    'month' => '12月',
                    'event' => '100万円増資、資本金2,300万円',
                  ]
                ]
              ],
              [
                'year' => '1993',
                'events' => [
                  [
                    'month' => '9月',
                    'event' => '関連会社福寿海運有限会社は、下ノ江造船株式会社にて、1,250屯積SUS304TYPⅢケミカルタンカー<br class="pc-only">“三英丸”を建造、第一タンカー株式会社に定期傭船',
                  ]
                ]
              ],
              [
                'year' => '1995',
                'events' => [
                  [
                    'month' => '11月',
                    'event' => '白浜造船株式会社にて、黒油タンカー”さんけい丸”2,000K/L積を建造、近海タンカー株式会社に<br class="pc-only">定期傭船',
                  ]
                ]
              ],
              [
                'year' => '1998',
                'events' => [
                  [
                    'month' => '6月',
                    'event' => '海王を国内売船',
                  ]
                ]
              ],
              [
                'year' => '2000',
                'events' => [
                  [
                    'month' => '9月',
                    'event' => 'NKにおいて、任意ISM：適合認定書（DOC）取得',
                  ],
                  [
                    'month' => '10月',
                    'event' => 'さんけい丸、任意ISM：船舶安全管理認定書（SMC）取得',
                  ]
                ]
              ],
              [
                'year' => '2003',
                'events' => [
                  [
                    'month' => '12月',
                    'event' => '清水錬太郎、会長に就任。清水修、社長に就任',
                  ]
                ]
              ],
              [
                'year' => '2004',
                'events' => [
                  [
                    'month' => '7月',
                    'event' => '村上秀造船株式会社にて、1,500屯積SUS304TYP IIケミカルタンカー”三元丸”を建造、第一タンカー株式会社に定期傭船',
                  ],
                  [
                    'month' => '11月',
                    'event' => '三英丸、任意ISM：船舶安全管理認定書（SMC）取得',
                  ]
                ]
              ],
              [
                'year' => '2005',
                'events' => [
                  [
                    'month' => '9月',
                    'event' => '三元丸、任意ISM：船舶安全管理認定書（SMC）取得',
                  ]
                ]
              ],
              [
                'year' => '2007',
                'events' => [
                  [
                    'month' => '7月',
                    'event' => '第二海王を解撤',
                  ]
                ]
              ],
              [
                'year' => '2008',
                'events' => [
                  [
                    'month' => '10月',
                    'event' => '三光タンカー株式会社を三光運輸株式会社に改称',
                  ]
                ]
              ],
              [
                'year' => '2009',
                'events' => [
                  [
                    'month' => '3月',
                    'event' => '矢野造船株式会社にて、1,830載貨重量屯型鋼材船”さんしゅう丸”を建造、三洋海運株式会社に定期傭船',
                  ],
                  [
                    'month' => '4月',
                    'event' => '三光丸を解撤',
                  ]
                ]
              ],
              [
                'year' => '2013',
                'events' => [
                  [
                    'month' => '4月',
                    'event' => '中谷造船株式会社にて、1,500屯積TYPE IIケミカルタンカー新風丸を建造、JFE物流株式会社に<br class="pc-only">定期傭船',
                  ],
                  [
                    'month' => '7月',
                    'event' => '日英丸を海外売船',
                  ],
                  [
                    'month' => '9月',
                    'event' => '460万円増資、資本金2,760万円とする',
                  ]
                ]
              ],
              [
                'year' => '2014',
                'events' => [
                  [
                    'month' => '7月',
                    'event' => '三元丸を鶴見サンマリン株式会社に定期傭船',
                  ]
                ]
              ],
              [
                'year' => '2016',
                'events' => [
                  [
                    'month' => '5月',
                    'event' => 'さんけい丸を海外売船<br>鶴弘丸2,000t積TYPE IIケミカルタンカーを購入',
                  ]
                ]
              ]
            ]; ?>
            <ul class="company__history-list">
              <?php foreach ($historyItem as $item) : ?>
                <li class="company__history-item">
                  <p class="company__history-year"><?php echo wp_kses_post($item['year']); ?></p>
                  <?php foreach ($item['events'] as $wrap) : ?>
                    <div class="company__history-wrap">
                      <p class="company__history-month"><?php echo wp_kses_post($wrap['month']); ?></p>
                      <p class="company__history-event"><?php echo wp_kses_post($wrap['event']); ?></p>
                    </div>
                  <?php endforeach; ?>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    </section>
  </div>

  <section id="recruit" class="recruit layout-recruit">
    <div class="recruit__wrapper">
      <div class="recruit__accent">
        <div class="en-accent" aria-hidden="true">Recruit</div>
      </div>
      <div class="recruit__inner inner">
        <div class="recruit__container">
          <div class="recruit__title">
            <div class="section-title">
              <div class="section-title__en section-title__en--screen" style="--_width-sp: 156; --_width-pc: 246;">
                <img src="<?php img_path('title-recruit.svg'); ?>" alt="Recruit" width="156" height="36" loading="lazy">
              </div>
              <h2 class="section-title__ja">採用情報</h2>
            </div>
          </div>
          <?php
          $recruitItem = [
            [
              'job' => '職種が入ります。募集職種を増やせます',
              'details' => [
                [
                  'term' => '業務内容',
                  'desc' => '集配ドライバー、航空貨物の仕分け作業等',
                ],
              ],
            ],
            [
              'job' => 'ドライバー、フォークリフトオペレーター（嘱託社員）',
              'details' => [
                [
                  'term' => '業務内容',
                  'desc' => '集配ドライバー、航空貨物の仕分け作業等',
                ],
                [
                  'term' => '給与',
                  'desc' => '月給175,100円 （諸手当込み）+ 固定残業代（30H）37,955円 + 交通費 7,000円<br>（30Hを超える残業代は、別途追加で支給。）',
                ],
                [
                  'term' => '昇給・賞与',
                  'desc' => '昇給：年1回　賞与：年2回',
                ],
                [
                  'term' => '諸手当',
                  'desc' => '各種保険完備、制服貸与',
                ],
                [
                  'term' => '休日',
                  'desc' => '週1回～2回 シフト制　希望休み相談に応じます。※社内規定に準ずる。',
                ],
                [
                  'term' => '勤務時間',
                  'desc' => '07：00～20：00の間で実働7.5h<br>（シフト制。職種や状況により出社時間変動有り）',
                ]
              ],
            ],
          ];
          ?>
          <?php
          function hasValidDetails($details)
          {
            foreach ($details as $detail) {
              if (!empty($detail['term']) && !empty($detail['desc'])) {
                return true;
              }
            }
            return false;
          }
          ?>
          <ul class="recruit__list">
            <?php foreach ($recruitItem as $item) : ?>
              <?php
              if (empty($item['job']) || empty($item['details']) || !hasValidDetails($item['details'])) {
                continue;
              }
              ?>
              <li class="recruit__item">
                <details class="recruit-block js-details">
                  <summary class="recruit-block__title js-summary"><?php echo wp_kses_post($item['job']); ?></summary>
                  <dl class="recruit-block__content js-content">
                    <div class="recruit-block__inner">
                      <?php foreach ($item['details'] as $detail) : ?>
                        <?php if (!empty($detail['term']) && !empty($detail['desc'])) : ?>
                          <div class="recruit-block__detail">
                            <dt class="recruit-block__detail-term"><?php echo wp_kses_post($detail['term']); ?></dt>
                            <dd class="recruit-block__detail-desc"><?php echo wp_kses_post($detail['desc']); ?></dd>
                          </div>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </div>
                  </dl>
                </details>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="recruit__img">
      <img src="<?php img_path('accent-img.webp'); ?>" alt="" width="640" height="375" loading="lazy">
    </div>
  </section>

  <section id="contact" class="contact layout-contact">
    <div class="contact__accent">
      <div class="en-accent" aria-hidden="true">Contact</div>
    </div>
    <div class="contact__inner inner">
      <div class="contact__container">
        <div class="contact__title">
          <div class="section-title">
            <div class="section-title__en" style="--_width-sp: 147; --_width-pc: 267;">
              <img src="<?php img_path('title-contact.svg'); ?>" alt="Contact" width="147" height="30" loading="lazy">
            </div>
            <h2 class="section-title__ja">お問い合わせ</h2>
          </div>
        </div>
      </div>
      <div class="contact__wrap">
        <p class="contact__text">
          当社に関するご意見・ご要望・ご質問など各種お問い合わせは、以下のフォームにご入力の上、「送信」ボタンを押してください。<span class="color-red">*</span>は必須項目です。
        </p>
        <div class="contact__info">
          <p class="contact__info-head">お電話でのお問い合わせ</p>
          <p class="contact__info-tel">
            <span class="contact__info-tel-head">TEL.</span>
            <span class="contact__info-tel-num">089-925-1041</span>
          </p>
          <p class="contact__info-hours">
            受付時間 9:00-17:00（土日祝・年末年始を除く）
          </p>
        </div>
      </div>
      <div class="contact__form">
        <?php the_content(); ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>