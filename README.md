# theme_lozenge

Moodle wearing the [Lozenge design system](https://github.com/jethac/lozenge) — a Boost child theme driven by Lozenge's OKLCH token engine.

What makes it unusual: the theme settings aren't colour pickers, they're **axes**. Scheme (auto/light/dark), a **continuous contrast dial** (−1…+1, legibility contract-tested across the whole range in the upstream design system), **parametric accent** (hue/chroma — the entire accent system re-derives, Jira blue is just the default position), and **glass materials** (frosted navbar/menus/modals that fade to solid as contrast rises, auto-disabled for reduced-transparency and forced-colors users).

## How it works

- `scss/engine.scss` — the generated Lozenge engine (CSS custom properties: reference ramps, system tokens resolved via OKLCH relative color, the axis math). Regenerated from `jethac/lozenge`, not hand-edited.
- `scss/lozenge.scss` — the override layer: maps Moodle/Boost's Bootstrap 5 surfaces (`--bs-*` component variables, cards, drawers, alerts, modals, forms, tabs, badges…) onto `--lz-sys-*` tokens, so the axes drive the live UI.
- `lib.php` — Boost preset + engine + overrides at SCSS compile; theme settings emitted as root custom properties (dark scheme forced by re-rooting the engine's dark block).

## Install

```bash
cp -r . /path/to/moodle/theme/lozenge
php admin/cli/upgrade.php --non-interactive
php admin/cli/cfg.php --name=theme --set=lozenge
php admin/cli/purge_caches.php
```

Settings: Site administration → Appearance → Themes → Lozenge.

Not affiliated with Atlassian or Moodle HQ.
