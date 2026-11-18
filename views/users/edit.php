<?php include __DIR__ . '/../partials/header.php'; ?>
<main class="container">
    <h1>Edit user</h1>
    <?php if ($error !== ''): ?>
        <p class="alert alert-danger" role="alert"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form action="/admin/users/edit?id=<?= rawurlencode((string) $user->id) ?>" method="post">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken) ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control"
                   value="<?= htmlspecialchars($user->name) ?>" maxlength="1024" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control"
                   value="<?= htmlspecialchars($user->email) ?>" maxlength="255" required>
        </div>
        <button type="submit" class="btn btn-primary">Save changes</button>
        <a href="/admin/users" class="btn btn-outline-secondary">Cancel</a>
    </form>
</main>
<?php include __DIR__ . '/../partials/footer.php'; ?>
