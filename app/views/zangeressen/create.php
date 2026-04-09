<?php require_once APPROOT . '/views/includes/header.php'; ?>

<!-- Voor het centreren van de container gebruiken we het bootstrap grid -->
<div class="container">
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-6">
            <h3 class="text-success"><?php echo $data['title']; ?></h3>
        </div>
    </div>

    <!-- Terugkoppeling naar de gebruiker -->
    <div class="row mt-3 d-<?= $data['display']; ?> justify-content-center">
        <div class="col-6">
            <div class="alert alert-<?= $data['color'] ?? 'success' ?>" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-6">
            <form action="<?= URLROOT; ?>/ZangeressenController/create" method="post">
                <div class="mb-3">
                    <label for="naam" class="form-label">Naam</label>
                    <input name="naam" type="text" class="form-control <?= isset($data['errors']['naam']) ? 'is-invalid' : ''; ?>" id="naam" value="<?= $_POST['naam'] ?? ''; ?>">
                    <?php if (isset($data['errors']['naam'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['naam']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="land" class="form-label">Land</label>
                    <input name="land" type="text" class="form-control <?= isset($data['errors']['land']) ? 'is-invalid' : ''; ?>" id="land" value="<?= $_POST['land'] ?? ''; ?>">
                    <?php if (isset($data['errors']['land'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['land']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="vermogen" class="form-label">Vermogen</label>
                    <input name="vermogen" type="number" min="0" step="0.01" class="form-control <?= isset($data['errors']['vermogen']) ? 'is-invalid' : ''; ?>" id="vermogen" value="<?= $_POST['vermogen'] ?? ''; ?>">
                    <?php if (isset($data['errors']['vermogen'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['vermogen']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="leeftijd" class="form-label">Leeftijd</label>
                    <input name="leeftijd" type="number" min="0" class="form-control <?= isset($data['errors']['leeftijd']) ? 'is-invalid' : ''; ?>" id="leeftijd" value="<?= $_POST['leeftijd'] ?? ''; ?>">
                    <?php if (isset($data['errors']['leeftijd'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['leeftijd']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="aantalhits" class="form-label">Aantal hits</label>
                    <input name="aantalhits" type="number" min="0" class="form-control <?= isset($data['errors']['aantalhits']) ? 'is-invalid' : ''; ?>" id="aantalhits" value="<?= $_POST['aantalhits'] ?? ''; ?>">
                    <?php if (isset($data['errors']['aantalhits'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['aantalhits']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="debuutjaar" class="form-label">Debuutjaar</label>
                    <input name="debuutjaar" type="number" min="1900" max="2100" class="form-control <?= isset($data['errors']['debuutjaar']) ? 'is-invalid' : ''; ?>" id="debuutjaar" value="<?= $_POST['debuutjaar'] ?? ''; ?>">
                    <?php if (isset($data['errors']['debuutjaar'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['debuutjaar']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="isactief" class="form-label">Actief</label>
                    <select name="isactief" class="form-control <?= isset($data['errors']['isactief']) ? 'is-invalid' : ''; ?>" id="isactief">
                        <option value="">Maak een keuze</option>
                        <option value="1" <?= (isset($_POST['isactief']) && $_POST['isactief'] == '1') ? 'selected' : ''; ?>>Ja</option>
                        <option value="0" <?= (isset($_POST['isactief']) && $_POST['isactief'] == '0') ? 'selected' : ''; ?>>Nee</option>
                    </select>
                    <?php if (isset($data['errors']['isactief'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['isactief']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="opmerking" class="form-label">Opmerking</label>
                    <input name="opmerking" type="text" class="form-control <?= isset($data['errors']['opmerking']) ? 'is-invalid' : ''; ?>" id="opmerking" value="<?= $_POST['opmerking'] ?? ''; ?>">
                    <?php if (isset($data['errors']['opmerking'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['opmerking']; ?></div>
                    <?php endif; ?>
                </div>

               <div class="d-flex justify-content-between mt-3 mb-5">
                <button type="submit" class="btn btn-primary">Verstuur</button>
            <a href="<?= URLROOT; ?>/homepages/index" class="btn btn-outline secondary">
                <i class="bi bi-arrow-left"></i> Terug naar homepage</a>
            </form>

            
        </div>
    </div>
</div>
<!-- eind tabel -->

<?php require_once APPROOT . '/views/includes/footer.php'; ?>