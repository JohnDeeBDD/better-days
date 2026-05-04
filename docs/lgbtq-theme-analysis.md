# LGBTQ+ Analysis — Better Days Theme Profile

_For Trish Karlinski's review prior to our personal meeting._

This document inventories where the **Better Days** WordPress theme currently
signals LGBTQ+ identity and inclusion, and where it is silent on the topic. It
is intended as a working snapshot of the theme as-is — not a recommendation —
so that we can decide together which areas to lean into, which to leave
unchanged, and where the messaging should be tightened for consistency.

---

## 1. Aspects that DO highlight LGBTQ+ identity

These are the existing touchpoints in the theme where LGBTQ+ inclusion is
explicitly visible to a visitor.

### 1.1 Hero section — strongest signal area
File: `template-parts/hero.php`, defaults in `inc/front-page-defaults.php`

- **Pride flag banner** (`hero-pride-banner`) — a six-stripe rainbow rendered
  in CSS at the top of the hero, using the standard pride colors:
  - red `#e40303`, orange `#ff8c00`, yellow `#ffed00`, green `#008026`,
    blue `#2446ff`, violet `#750787`
  - Defined in `assets/css/main.css:446-469`.
- **Pride tagline** above the headline:
  > "LGBTQ+ affirming consulting and community-first support"
- **Hero headline** (default copy):
  > "Proudly LGBTQ+ Inclusive Consulting"
- **Hero subhead / supporting text** (default copy):
  > "Strategic guidance for LGBTQ+ people, couples, and organizations seeking
  > affirming support, bold growth, and values-driven outcomes."
- **Primary CTA button** (default): "Book an Inclusive Consultation"

### 1.2 About / "Why Work With Trish" section
File: `template-parts/about.php`

- Body copy explicitly references _"a commitment to LGBTQ+ affirming support
  every step of the way."_
- Bulleted features list includes **"LGBTQ+ affirming and inclusive approach"**
  as one of four selling points.

### 1.3 Branch / project framing
- The theme is being developed on the branch `claude/analyze-lgbtq-theme-…`,
  signalling that LGBTQ+ positioning is currently a focus for the project
  (internal-only signal, not visitor-facing).

---

## 2. Aspects that DO NOT highlight LGBTQ+ identity

These are areas where the theme is currently **silent** on LGBTQ+ identity —
either by design (focused on the senior-care service offering) or by
oversight. Several of these create a noticeable disconnect with the hero.

### 2.1 Services section
File: `template-parts/services.php`, defaults in `inc/front-page-defaults.php`

- Section heading: **"Senior Care Placement Services"** — no LGBTQ+ framing.
- All six service cards are written in generic senior-care language:
  Care Needs Assessment, Retirement Home Matching, Facility Onboarding
  Support, 24/7 Nursing Care Navigation, Family Decision Coaching, Post-Move
  Follow Through.
- None of the service descriptions mention affirming care, chosen family,
  partner inclusion, or LGBTQ+-competent facilities.

### 2.2 Testimonials section
File: `template-parts/testimonials.php`, defaults in `inc/front-page-defaults.php`

- Section heading is **"Family Stories"** (heteronormative-default framing).
- The three default testimonials use generic relational roles —
  "Daughter of Resident", "Family Care Coordinator", "Spouse of Client" —
  with no visible LGBTQ+ representation (e.g., no "partner",
  "chosen family", same-sex couple, or LGBTQ+ elder voice).

### 2.3 Call-to-action section
File: `template-parts/cta.php`

- Heading: "Let's Find the Right Care Together" — neutral, not affirming-coded.
- Subtext speaks only to "your loved one's next step in full-time care".
- No reiteration of LGBTQ+ inclusion at the conversion point — the place
  where a hesitant LGBTQ+ visitor most needs reassurance.

### 2.4 Front-page image slider
File: `template-parts/front-slider.php`

- Slides are: LinkedIn card, Facebook card, plus `slider-3.svg` and
  `slider-4.svg` (illustrations of a family receiving placement guidance and
  a residence supporting nursing care).
- No pride imagery, no rainbow accents, no LGBTQ+ couple/elder representation.
- No SafeZone / SAGE / HRC-style affiliation badges.

### 2.5 Header & navigation
File: `header.php`

- Site title and primary nav only — no pride mark, badge, or "LGBTQ+ Affirming"
  ribbon persists once the user scrolls past the hero.

### 2.6 Footer
File: `footer.php`

- Default footer copy: _"Better Days for Seniors | Senior Care Placement &
  Onboarding Support"_ — no LGBTQ+ tagline.
- No pride emblem or affirming-business badge in the footer area.
- Social icon block is generic (LinkedIn / Facebook / Twitter / Instagram).

### 2.7 Image assets
Directory: `assets/images/`

- Inventory: `Facebook.png`, `LinkedIn_2021.svg`, `slider-1.svg`,
  `slider-2.svg`, `slider-3.svg`, `slider-4.svg`, `trish_karlinski.jpeg`.
- The pride flag is rendered in CSS only — there is no pride-flag image
  asset, no LGBTQ+ elder photography, and no visual cues outside the hero.
- Hero headshot alt text reads "Trish Karlinski — Adult Services Consultant"
  rather than something like "LGBTQ+ affirming senior care consultant".

### 2.8 Color system
File: `assets/css/main.css`

- The overall palette is the **teal-blue business aesthetic** described in
  `style.css` ("modern teal-blue aesthetic"). Pride colors appear only inside
  the small (210×26 px) hero banner. They are not echoed anywhere else
  (buttons, dividers, section accents, focus states).
- The reduced-motion / responsive rules touch the pride banner only for
  layout (`assets/css/main.css:1563-1567`); no other component uses the
  rainbow palette.

### 2.9 Theme metadata & repo-level positioning
- `style.css` header description: _"A clean, professional business consulting
  theme with a modern teal-blue aesthetic."_ — no mention of LGBTQ+
  inclusion.
- `style.css` `Tags:` line lists `business, consulting, professional,
  custom-menu, custom-logo, featured-images, theme-options` — no
  inclusion/affirming-care tags.
- `README.md` describes the theme as a senior-services site for Trish; it
  does not mention LGBTQ+ affirming care as part of the brand promise.

### 2.10 Internal consistency gap
The clearest tension worth discussing in our meeting:

- The **hero** promises _"Strategic guidance for LGBTQ+ people, couples, and
  organizations"_, but the **services** that immediately follow are
  exclusively framed around senior care placement for "families" and
  "loved ones". A visitor who arrives via the hero promise is not shown a
  service that explicitly serves LGBTQ+ elders, same-sex spouses, or
  chosen-family caregivers.
- This gap exists in the **default copy** in
  `inc/front-page-defaults.php` and will appear on any site that has not
  customized these strings via the WordPress Customizer.

---

## 3. Summary table

| Area                          | Highlights LGBTQ+? | Notes                                                                 |
|-------------------------------|--------------------|-----------------------------------------------------------------------|
| Hero pride banner             | Yes                | 6-stripe rainbow, CSS-rendered                                        |
| Hero tagline                  | Yes                | "LGBTQ+ affirming consulting…"                                        |
| Hero headline / subhead / CTA | Yes                | Explicit LGBTQ+ language in default copy                              |
| About section                 | Yes                | Body copy + feature bullet                                            |
| Services section              | No                 | Senior-care language only                                             |
| Testimonials                  | No                 | Generic family roles, no LGBTQ+ voice                                 |
| Front slider                  | No                 | LinkedIn/Facebook + senior-care illustrations                         |
| Header / nav                  | No                 | No persistent pride mark                                              |
| Footer                        | No                 | Generic tagline, no pride emblem                                      |
| CTA / contact section         | No                 | Conversion moment lacks affirming reassurance                         |
| Image assets                  | No                 | No pride imagery beyond CSS banner                                    |
| Color system                  | Partial            | Pride colors confined to one small hero element                       |
| Theme metadata (style.css)    | No                 | Description and tags omit inclusion language                          |
| README                        | No                 | Brand promise not stated                                              |

---

## 4. Open questions for our meeting

These are intentionally _questions_, not recommendations — pulling them
together so we can decide together:

1. Should LGBTQ+ affirming care be the **primary** brand position, or a
   **co-equal** message alongside senior care placement?
2. Should the **services** copy be rewritten to explicitly name
   LGBTQ+-affirming care (e.g., partner inclusion, facility vetting for
   LGBTQ+ competency), or left neutral?
3. Should at least one **testimonial** reflect an LGBTQ+ elder, same-sex
   spouse, or chosen-family caregiver?
4. Do we want a persistent **pride mark** in the header or footer, or keep
   the rainbow contained to the hero?
5. Should we add affiliation imagery — e.g., SAGECare, HRC, or local
   LGBTQ+ senior-services partners — to the slider or footer?
6. Should `style.css`'s theme description and tag list be updated to reflect
   the LGBTQ+ affirming positioning?
