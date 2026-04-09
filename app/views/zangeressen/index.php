<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">
            <h3><?php echo $data['title']; ?></h3>
        </div>
    </div>

    <div class="row mt-3 d-<?= $data['display']; ?> justify-content-center">
        <div class="col-10 text-begin text-primary">
            <div class="alert alert-success" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10 text-begin text-danger">
            <a href="<?= URLROOT; ?>/ZangeressenController/create"
               class="btn btn-warning"
               role="button">Nieuwe zangeres
            </a>
        </div>
    </div>

    <div class="row mb-3 justify-content-center">
        <div class="col-10">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Land</th>
                        <th>Vermogen</th>
                        <th>Leeftijd</th>
                        <th>Aantal hits</th>
                        <th>Debuutjaar</th>
                        <th>Actief</th>
                        <th>Opmerking</th>
                        <th>DatumAangemaakt</th>
                        <th>Wijzig</th>
                        <th>Verwijder</th>
                    </tr>
                </thead>

                <tbody>
                <?php foreach ($data["result"] as $zangeres): ?>
                    <tr>
                        <td><?= $zangeres->Naam; ?></td>
                        <td><?= $zangeres->Land; ?></td>
                        <td><?= $zangeres->Vermogen; ?></td>
                        <td><?= $zangeres->Leeftijd; ?></td>
                        <td><?= $zangeres->AantalHits; ?></td>
                        <td><?= $zangeres->DebuutJaar; ?></td>
                        <td><?= $zangeres->IsActief ? 'Ja' : 'Nee'; ?></td>
                        <td><?= $zangeres->Opmerking; ?></td>
                        <td><?= $zangeres->DatumAangemaakt; ?></td>
                        <td class="text-center">
                            <a href="<?= URLROOT; ?>/ZangeressenController/update/<?= $zangeres->Id; ?>">
                                <i class="bi bi-pencil-square text-primary"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="<?= URLROOT; ?>/ZangeressenController/delete/<?= $zangeres->Id; ?>"
                               onclick="return confirm('Weet je zeker dat je dit record wilt verwijderen?');">
                                <i class="bi bi-trash-fill text-danger"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <a href="<?= URLROOT; ?>/homepages/index" class="btn btn-outline secondary">
                <i class="bi bi-arrow-left"></i> Terug naar homepage</a>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>