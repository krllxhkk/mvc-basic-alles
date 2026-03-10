<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <h3><?= $data['title']; ?></h3>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Merk</th>
                        <th>Model</th>
                        <th>Type</th>
                        <th>Actief</th>
                        <th>Omschrijving</th>
                        <th>Datum aangemaakt</th>
                        <th>Datum gewijzigd</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['sneakers'] as $sneaker): ?>
                        <tr>
                            <td><?= $sneaker->Merk; ?></td>
                            <td><?= $sneaker->Model; ?></td>
                            <td><?= $sneaker->Type; ?></td>
                            <td><?= $sneaker->IsActief ? 'Ja' : 'Nee'; ?></td>
                            <td><?= $sneaker->Opmerking; ?></td>
                            <td><?= $sneaker->DatumAangemaakt; ?></td>
                            <td><?= $sneaker->DatumGewijzigd; ?></td>
                            <td class="text-center">
                        <a href="<?= URLROOT; ?>/SneakerController/delete/<?= $sneaker->Id; ?>"
                            onclick="return confirm('Weet je zeker dat je dit record wilt verwijderen?');">
                            <i class="bi bi-trash3-fill text-danger"></i>
                        </a>
                    </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <a href="<?= URLROOT; ?>/homepage/index" class="btn btn-primary">
                Terug
            </a>

        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>