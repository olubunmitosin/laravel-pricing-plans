# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).


## [0.3.4] - 2021-12-21

### Fixed
- A fixed bug to return subscription model instead of subscription as a string
- Fixed missing SubscriptionPlanChanged event class



## [0.3.3] - 2018-08-09

### Fixed
- Fixed #10: Missing `plan_id` when create new subscription. Thank @Georde ([7af238e](https://github.com/oanhnn/laravel-pricing-plans/commit/7af238ebc0368e2170643385ece0e1aa9903bcb4))



## [0.3.2] - 2018-08-07

### Fixed
- Fixed #3 : Incorrect `belongTo` parameters in `BelongsToPlanModel` Trait. ([32ee324](https://github.com/oanhnn/laravel-pricing-plans/commit/32ee3243907feffbe80f3ae0a2f226ce3ca1f5df))
- Fixed #8 : Missing `findByCode` method. ([32ee324](https://github.com/oanhnn/laravel-pricing-plans/commit/32ee3243907feffbe80f3ae0a2f226ce3ca1f5df))
- Fixed: `SubscriptionAbility::consumed()` method return incorrect value. ([32ee324](https://github.com/oanhnn/laravel-pricing-plans/commit/32ee3243907feffbe80f3ae0a2f226ce3ca1f5df))



## [0.3.1] - 2018-07-20

### Fixed
- Fixed: `Subscribable` trait with `Subscriber` interface. ([304f7b6](https://github.com/oanhnn/laravel-pricing-plans/tree/304f7b60db149b52e76f847a7913349f113bb602))
- Fixed: TravisCI send coverage. ([b329094](https://github.com/oanhnn/laravel-pricing-plans/commit/b32909481d2116fc51793567f78acaec20cf9f98))



## [0.3.0] - 2018-05-27

### Added
- Add local scope `code` for `Plan` and `Feature` model

### Fixed
- Fixed: Missing `value` and `node` attributes of `$plan->features->pivot`



## [0.2.3] - 2018-03-27

### Fixed
- Fixed: incorrect relationship in Feature and Plan models. ([51ff5f3](https://github.com/oanhnn/laravel-pricing-plans/commit/51ff5f3644a318b999cc47491baa5d7c9d36d7ad))
  Thank @cimon77



## [0.2.2] - 2018-03-27

### Changed
- Update TravisCI, remove allow failure on Laravel 5.6.* ([d7f934f](https://github.com/oanhnn/laravel-pricing-plans/commit/d7f934f49637460d9978fac1d803b6fae095e6d4))

### Fixed
- Fixed: Incorrect relationship in Feature model. ([7b26b76](https://github.com/oanhnn/laravel-pricing-plans/commit/7b26b7619a34af2e9a81921d50e343f552f081c4))
  Thank @cimon77



## [0.2.1] - 2018-02-26
### Added
- Add link to origin repository in README ([afe05ce](https://github.com/oanhnn/laravel-pricing-plans/commit/afe05cee6fd1c0b1e9f5fbfe672f48dd2cbb4967))

### Changed
- Changed CHANGELOG format ([afe05ce](https://github.com/oanhnn/laravel-pricing-plans/commit/afe05cee6fd1c0b1e9f5fbfe672f48dd2cbb4967))
- Update LICENSE ([afe05ce](https://github.com/oanhnn/laravel-pricing-plans/commit/afe05cee6fd1c0b1e9f5fbfe672f48dd2cbb4967))

### Fixed
- Fixed: TravisCI build ([358dcee](https://github.com/oanhnn/laravel-pricing-plans/commit/358dcee6afbc99b75da967fcd25f4656d3dfa16b))



## [0.2.0] - 2018-02-22
### Added
- Laravel 5.6 Compatibility ([e754ae0](https://github.com/oanhnn/laravel-pricing-plans/commit/e754ae01a6c086d1c5b75074b1376a057d616b35))
- Added matrix test with TravisCI ([e754ae0](https://github.com/oanhnn/laravel-pricing-plans/commit/e754ae01a6c086d1c5b75074b1376a057d616b35))

### Changed
- Added `code` column to `plans` and `features` tables ([dce3518](https://github.com/oanhnn/laravel-pricing-plans/commit/dce351893d386d8cd8207608c8f92820767c8ac8))



## 0.1.0 - 2018-01-09
### Added
- Initial repository and package
- Added migration file
- Added config file
- Added some tests



[Unreleased]: https://github.com/oanhnn/laravel-pricing-plans/compare/v0.3.3...develop
[0.3.3]:      https://github.com/oanhnn/laravel-pricing-plans/compare/v0.3.2...v0.3.3
[0.3.2]:      https://github.com/oanhnn/laravel-pricing-plans/compare/v0.3.1...v0.3.2
[0.3.1]:      https://github.com/oanhnn/laravel-pricing-plans/compare/v0.3.0...v0.3.1
[0.3.0]:      https://github.com/oanhnn/laravel-pricing-plans/compare/v0.2.3...v0.3.0
[0.2.3]:      https://github.com/oanhnn/laravel-pricing-plans/compare/v0.2.2...v0.2.3
[0.2.2]:      https://github.com/oanhnn/laravel-pricing-plans/compare/v0.2.1...v0.2.2
[0.2.1]:      https://github.com/oanhnn/laravel-pricing-plans/compare/v0.2.0...v0.2.1
[0.2.0]:      https://github.com/oanhnn/laravel-pricing-plans/compare/v0.1.0...v0.2.0
