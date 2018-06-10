import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { KeeperDetailComponent } from './keeper-detail.component';

describe('KeeperDetailComponent', () => {
  let component: KeeperDetailComponent;
  let fixture: ComponentFixture<KeeperDetailComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ KeeperDetailComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(KeeperDetailComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
