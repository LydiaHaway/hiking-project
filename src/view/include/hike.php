<div class="hikes__item">
    <div class="row">
        <div class="col-sm-3 col-12 hikes__picture">
            <?php
            if ($hike["illustration"] != NULL) {
            ?>
                <img class="hikes__img" src="<?php echo htmlspecialchars($hike['illustration']); ?>" alt="illustration" />
            <?php
            }
            ?>
            <span class="hikes__date"><?php echo date("d-m-Y", strtotime($hike['date'])); ?></span>
        </div>
        <div class="col-sm-9 col-12 hikes__content">
            <h3 class="hikes__title">
                <?php echo htmlspecialchars($hike['name']); ?>
            </h3>
            <?php
            foreach ($users->getUser($hike['ID_user']) as $key => $user) {
            ?>
                <p class="hikes__user">
                    Par <?php echo htmlspecialchars($user['nickname']); ?>
                    <?php if ($hike['date'] != $hike['update_hike']) { ?>
                        <span class="hikes__date-upd">
                            <small>- modifié le <?php echo date("d-m-Y", strtotime($hike['update_hike'])); ?></small>
                    </span>
                    <?php } ?>
                </p>
            <?php
            }
            ?>

            <p class="hikes__location">
                Départ depuis <?php echo htmlspecialchars($hike['location']); ?>
            </p>
            
            <ul class="hikes__meta">
                <li class="hikes__meta-value hikes__meta-value--distance">
                    <strong>Distance: </strong><?php echo htmlspecialchars($hike['distance']); ?> km
                </li>
                <li class="hikes__meta-value hikes__meta-value--elevation">
                    <strong>Dénivelé positif: </strong><?php echo htmlspecialchars($hike['elevation_gain']); ?> m
                </li>
                <li class="hikes__meta-value hikes__meta-value--duration">
                    <strong>Durée moyenne: </strong><?php echo htmlspecialchars($hike['duration']); ?>h
                </li>
            </ul>
            <div class="row hikes__bottom">
                <div class="col-sm-9 col-12">
                    <ul class="tags tags--small"> 
                        <li>Tags: </li>
                        <?php
                        foreach ($tags->getTag($hike['ID_tags']) as $key => $tag) {
                        ?>
                            <li>
                                <a class="tags__link" href="tag?id=<?php echo htmlspecialchars($hike['ID_tags']); ?>">
                                    <?php echo htmlspecialchars($tag['name']); ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-sm-3 col-12 text-right">
                    <a class="link" href="hike?id=<?php echo htmlspecialchars($hike['ID']); ?>">
                        Plus d'info
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>